<?php

namespace App\Http\Requests;

use App\Models\Maintainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaintainerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maintainer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'units_assigneds.*' => [
                'integer',
            ],
            'units_assigneds' => [
                'array',
            ],
            'property_assigneds.*' => [
                'integer',
            ],
            'property_assigneds' => [
                'array',
            ],
        ];
    }
}
