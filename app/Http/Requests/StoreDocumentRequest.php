<?php

namespace App\Http\Requests;

use App\Models\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('document_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'document_types.*' => [
                'integer',
            ],
            'document_types' => [
                'required',
                'array',
            ],
            'tenants.*' => [
                'integer',
            ],
            'tenants' => [
                'array',
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
        ];
    }
}
