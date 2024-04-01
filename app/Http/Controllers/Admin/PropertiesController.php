<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Landlord;
use App\Models\Property;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PropertiesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::with(['landlord', 'media'])->get();

        $properties = Property::paginate(12); // Paginate with 10 items per page
        //return view('admin.properties.index', compact('properties'));

        $landlords = Landlord::get();

        return view('admin.properties.index', compact('landlords', 'properties'));
    }

    public function create()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landlords = Landlord::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.properties.create', compact('landlords'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $property->id]);
        }

        return redirect()->route('admin.properties.index');
    }

    public function edit(Property $property)
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landlords = Landlord::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property->load('landlord');

        return view('admin.properties.edit', compact('landlords', 'property'));
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

        return redirect()->route('admin.properties.index');
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->load('landlord', 'propertyTenants', 'propertyApplyingApplications', 'propertyUnits', 'propertySections', 'propertyAssignedMaintainers', 'propertyExpenses', 'propertyDocuments', 'propertyInvoices');

        return view('admin.properties.show', compact('property'));
    }

    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyRequest $request)
    {
        $properties = Property::find(request('ids'));

        foreach ($properties as $property) {
            $property->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('property_create') && Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Property();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
