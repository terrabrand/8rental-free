<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUnitRequest;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Property;
use App\Models\Section;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UnitsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Unit::with(['property', 'unit_section', 'media'])->get();



        $units = Unit::paginate(12); // Paginate with 10 items per page
        //return view('admin.units.index', compact('units'));


        $properties = Property::get();

        $sections = Section::get();

        return view('admin.units.index', compact('properties', 'sections', 'units'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::pluck('property_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit_sections = Section::pluck('section_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.units.create', compact('properties', 'unit_sections'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $unit->id]);
        }

        return redirect()->route('admin.units.index');
    }

    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::pluck('property_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit_sections = Section::pluck('section_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit->load('property', 'unit_section');

        return view('admin.units.edit', compact('properties', 'unit', 'unit_sections'));
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

        return redirect()->route('admin.units.index');
    }

    public function show(Unit $unit)
    {
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->load('property', 'unit_section', 'unitApplyingApplications', 'unitExpenses', 'unitDocuments', 'unitInvoices');

        return view('admin.units.show', compact('unit'));
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnitRequest $request)
    {
        $units = Unit::find(request('ids'));

        foreach ($units as $unit) {
            $unit->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('unit_create') && Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Unit();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
