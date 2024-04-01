<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'tenants.*' => [
                'integer',
            ],
            'tenants' => [
                'required',
                'array',
            ],
            'landlords.*' => [
                'integer',
            ],
            'landlords' => [
                'array',
            ],
            'invoice_types.*' => [
                'integer',
            ],
            'invoice_types' => [
                'array',
            ],
            'properties.*' => [
                'integer',
            ],
            'properties' => [
                'array',
            ],
            'sections.*' => [
                'integer',
            ],
            'sections' => [
                'array',
            ],
            'units.*' => [
                'integer',
            ],
            'units' => [
                'array',
            ],
            'invoice_number' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_due' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'amount' => [
                'required',
            ],
            'date_paid' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
