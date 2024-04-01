<?php

namespace App\Http\Requests;

use App\Models\ExpenseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpenseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expense_type_edit');
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
