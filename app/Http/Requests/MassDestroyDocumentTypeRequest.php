<?php

namespace App\Http\Requests;

use App\Models\DocumentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('document_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:document_types,id',
        ];
    }
}
