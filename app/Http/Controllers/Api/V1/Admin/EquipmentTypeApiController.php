<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentTypeRequest;
use App\Http\Requests\UpdateEquipmentTypeRequest;
use App\Http\Resources\Admin\EquipmentTypeResource;
use App\Models\EquipmentType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipmentTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('equipment_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipmentTypeResource(EquipmentType::all());
    }

    public function store(StoreEquipmentTypeRequest $request)
    {
        $equipmentType = EquipmentType::create($request->all());

        return (new EquipmentTypeResource($equipmentType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EquipmentType $equipmentType)
    {
        abort_if(Gate::denies('equipment_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipmentTypeResource($equipmentType);
    }

    public function update(UpdateEquipmentTypeRequest $request, EquipmentType $equipmentType)
    {
        $equipmentType->update($request->all());

        return (new EquipmentTypeResource($equipmentType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EquipmentType $equipmentType)
    {
        abort_if(Gate::denies('equipment_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipmentType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
