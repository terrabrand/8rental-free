<?php

namespace App\Http\Requests;

use App\Models\EquipmentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEquipmentTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipment_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:equipment_types,id',
        ];
    }
}
