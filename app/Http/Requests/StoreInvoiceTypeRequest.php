<?php

namespace App\Http\Requests;

use App\Models\InvoiceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_type_create');
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
