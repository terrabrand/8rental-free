<?php

namespace App\Http\Requests;

use App\Models\Property;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('property_edit');
    }

    public function rules()
    {
        return [
            'property_name' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'more_images' => [
                'array',
            ],
        ];
    }
}
