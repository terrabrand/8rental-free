<?php

namespace App\Http\Requests;

use App\Models\Income;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIncomeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('income_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'income_type_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'date_of_income' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
