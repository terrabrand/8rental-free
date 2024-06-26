<?php

namespace App\Http\Requests;

use App\Models\IncomeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIncomeTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('income_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
