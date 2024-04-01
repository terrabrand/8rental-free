<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Requests\UpdateDocumentTypeRequest;
use App\Http\Resources\Admin\DocumentTypeResource;
use App\Models\DocumentType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentTypeResource(DocumentType::all());
    }

    public function store(StoreDocumentTypeRequest $request)
    {
        $documentType = DocumentType::create($request->all());

        return (new DocumentTypeResource($documentType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentType $documentType)
    {
        abort_if(Gate::denies('document_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentTypeResource($documentType);
    }

    public function update(UpdateDocumentTypeRequest $request, DocumentType $documentType)
    {
        $documentType->update($request->all());

        return (new DocumentTypeResource($documentType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentType $documentType)
    {
        abort_if(Gate::denies('document_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
