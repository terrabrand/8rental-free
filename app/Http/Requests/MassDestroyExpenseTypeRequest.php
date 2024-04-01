<?php

namespace App\Http\Requests;

use App\Models\ExpenseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpenseTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('expense_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expense_types,id',
        ];
    }
}
