<?php

namespace App\Http\Requests;

use App\Models\IncomeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIncomeTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('income_type_create');
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
