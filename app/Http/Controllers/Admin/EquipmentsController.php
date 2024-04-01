<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEquipmentRequest;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use App\Models\EquipmentType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EquipmentsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('equipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipments = Equipment::paginate(12); // Paginate with 10 items per page
        return view('admin.equipments.index', compact('equipments'));

        $equipments = Equipment::with(['equipment_type', 'media'])->get();

        return view('admin.equipments.index', compact('equipments'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipment_types = EquipmentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.equipments.create', compact('equipment_types'));
    }

    public function store(StoreEquipmentRequest $request)
    {
        $equipment = Equipment::create($request->all());

        if ($request->input('image', false)) {
            $equipment->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $equipment->id]);
        }

        return redirect()->route('admin.equipments.index');
    }

    public function edit(Equipment $equipment)
    {
        abort_if(Gate::denies('equipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipment_types = EquipmentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipment->load('equipment_type');

        return view('admin.equipments.edit', compact('equipment', 'equipment_types'));
    }

    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());

        if ($request->input('image', false)) {
            if (! $equipment->image || $request->input('image') !== $equipment->image->file_name) {
                if ($equipment->image) {
                    $equipment->image->delete();
                }
                $equipment->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($equipment->image) {
            $equipment->image->delete();
        }

        return redirect()->route('admin.equipments.index');
    }

    public function show(Equipment $equipment)
    {
        abort_if(Gate::denies('equipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipment->load('equipment_type');

        return view('admin.equipments.show', compact('equipment'));
    }

    public function destroy(Equipment $equipment)
    {
        abort_if(Gate::denies('equipment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipmentRequest $request)
    {
        $equipments = Equipment::find(request('ids'));

        foreach ($equipments as $equipment) {
            $equipment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('equipment_create') && Gate::denies('equipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Equipment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
