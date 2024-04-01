<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Resources\Admin\UnitResource;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitResource(Unit::with(['property', 'unit_section'])->get());
    }

    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->all());

        if ($request->input('cover_image', false)) {
            $unit->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
        }

        foreach ($request->input('unit_images', []) as $file) {
            $unit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('unit_images');
        }

        return (new UnitResource($unit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Unit $unit)
    {
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitResource($unit->load(['property', 'unit_section']));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->all());

        if ($request->input('cover_image', false)) {
            if (! $unit->cover_image || $request->input('cover_image') !== $unit->cover_image->file_name) {
                if ($unit->cover_image) {
                    $unit->cover_image->delete();
                }
                $unit->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
            }
        } elseif ($unit->cover_image) {
            $unit->cover_image->delete();
        }

        if (count($unit->unit_images) > 0) {
            foreach ($unit->unit_images as $media) {
                if (! in_array($media->file_name, $request->input('unit_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $unit->unit_images->pluck('file_name')->toArray();
        foreach ($request->input('unit_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $unit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('unit_images');
            }
        }

        return (new UnitResource($unit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
