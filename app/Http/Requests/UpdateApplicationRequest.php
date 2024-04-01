<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_edit');
    }

    public function rules()
    {
        return [
            'property_applying_id' => [
                'required',
                'integer',
            ],
            'unit_applying_id' => [
                'required',
                'integer',
            ],
            'date_of_intended_start' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
