<?php

namespace App\Http\Requests;

use App\Models\EquipmentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEquipmentTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('equipment_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
