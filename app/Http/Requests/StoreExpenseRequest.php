<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expense_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'landlords.*' => [
                'integer',
            ],
            'landlords' => [
                'array',
            ],
            'properties.*' => [
                'integer',
            ],
            'properties' => [
                'array',
            ],
            'units.*' => [
                'integer',
            ],
            'units' => [
                'array',
            ],
            'tenants.*' => [
                'integer',
            ],
            'tenants' => [
                'array',
            ],
            'expense_types.*' => [
                'integer',
            ],
            'expense_types' => [
                'required',
                'array',
            ],
            'date_of_expense' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
