<?php

namespace App\Http\Requests;

use App\Models\ExpenseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpenseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expense_type_create');
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
