<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\Admin\PropertyResource;
use App\Models\Property;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertiesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyResource(Property::with(['landlord'])->get());
    }

    public function store(StorePropertyRequest $request)
    {
        $property = Property::create($request->all());

        if ($request->input('main_image', false)) {
            $property->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_image'))))->toMediaCollection('main_image');
        }

        foreach ($request->input('more_images', []) as $file) {
            $property->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('more_images');
        }

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PropertyResource($property->load(['landlord']));
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        if ($request->input('main_image', false)) {
            if (! $property->main_image || $request->input('main_image') !== $property->main_image->file_name) {
                if ($property->main_image) {
                    $property->main_image->delete();
                }
                $property->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_image'))))->toMediaCollection('main_image');
            }
        } elseif ($property->main_image) {
            $property->main_image->delete();
        }

        if (count($property->more_images) > 0) {
            foreach ($property->more_images as $media) {
                if (! in_array($media->file_name, $request->input('more_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $property->more_images->pluck('file_name')->toArray();
        foreach ($request->input('more_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $property->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('more_images');
            }
        }

        return (new PropertyResource($property))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
