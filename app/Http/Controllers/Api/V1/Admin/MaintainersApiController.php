<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMaintainerRequest;
use App\Http\Requests\UpdateMaintainerRequest;
use App\Http\Resources\Admin\MaintainerResource;
use App\Models\Maintainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintainersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('maintainer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaintainerResource(Maintainer::with(['units_assigneds', 'section_assigned', 'property_assigneds'])->get());
    }

    public function store(StoreMaintainerRequest $request)
    {
        $maintainer = Maintainer::create($request->all());
        $maintainer->units_assigneds()->sync($request->input('units_assigneds', []));
        $maintainer->property_assigneds()->sync($request->input('property_assigneds', []));
        if ($request->input('image', false)) {
            $maintainer->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new MaintainerResource($maintainer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Maintainer $maintainer)
    {
        abort_if(Gate::denies('maintainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaintainerResource($maintainer->load(['units_assigneds', 'section_assigned', 'property_assigneds']));
    }

    public function update(UpdateMaintainerRequest $request, Maintainer $maintainer)
    {
        $maintainer->update($request->all());
        $maintainer->units_assigneds()->sync($request->input('units_assigneds', []));
        $maintainer->property_assigneds()->sync($request->input('property_assigneds', []));
        if ($request->input('image', false)) {
            if (! $maintainer->image || $request->input('image') !== $maintainer->image->file_name) {
                if ($maintainer->image) {
                    $maintainer->image->delete();
                }
                $maintainer->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($maintainer->image) {
            $maintainer->image->delete();
        }

        return (new MaintainerResource($maintainer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Maintainer $maintainer)
    {
        abort_if(Gate::denies('maintainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintainer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
