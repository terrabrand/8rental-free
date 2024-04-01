<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\Admin\DocumentResource;
use App\Models\Document;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource(Document::with(['document_types', 'tenants', 'landlords', 'properties', 'units'])->get());
    }

    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create($request->all());
        $document->document_types()->sync($request->input('document_types', []));
        $document->tenants()->sync($request->input('tenants', []));
        $document->landlords()->sync($request->input('landlords', []));
        $document->properties()->sync($request->input('properties', []));
        $document->units()->sync($request->input('units', []));

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource($document->load(['document_types', 'tenants', 'landlords', 'properties', 'units']));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update($request->all());
        $document->document_types()->sync($request->input('document_types', []));
        $document->tenants()->sync($request->input('tenants', []));
        $document->landlords()->sync($request->input('landlords', []));
        $document->properties()->sync($request->input('properties', []));
        $document->units()->sync($request->input('units', []));

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
