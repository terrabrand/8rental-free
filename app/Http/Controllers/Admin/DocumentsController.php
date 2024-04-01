<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Landlord;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documents = Document::with(['document_types', 'tenants', 'landlords', 'properties', 'units'])->get();

        $documents = Document::paginate(12); // Paginate with 10 items per page
        return view('admin.documents.index', compact('documents'));

        $document_types = DocumentType::get();

        $tenants = Tenant::get();

        $landlords = Landlord::get();

        $properties = Property::get();

        $units = Unit::get();

        return view('admin.documents.index', compact('document_types', 'documents', 'landlords', 'properties', 'tenants', 'units'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document_types = DocumentType::pluck('name', 'id');

        $tenants = Tenant::pluck('first_name', 'id');

        $landlords = Landlord::pluck('name', 'id');

        $properties = Property::pluck('property_name', 'id');

        $units = Unit::pluck('unit_name', 'id');

        return view('admin.documents.create', compact('document_types', 'landlords', 'properties', 'tenants', 'units'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create($request->all());
        $document->document_types()->sync($request->input('document_types', []));
        $document->tenants()->sync($request->input('tenants', []));
        $document->landlords()->sync($request->input('landlords', []));
        $document->properties()->sync($request->input('properties', []));
        $document->units()->sync($request->input('units', []));

        return redirect()->route('admin.documents.index');
    }

    public function edit(Document $document)
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document_types = DocumentType::pluck('name', 'id');

        $tenants = Tenant::pluck('first_name', 'id');

        $landlords = Landlord::pluck('name', 'id');

        $properties = Property::pluck('property_name', 'id');

        $units = Unit::pluck('unit_name', 'id');

        $document->load('document_types', 'tenants', 'landlords', 'properties', 'units');

        return view('admin.documents.edit', compact('document', 'document_types', 'landlords', 'properties', 'tenants', 'units'));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update($request->all());
        $document->document_types()->sync($request->input('document_types', []));
        $document->tenants()->sync($request->input('tenants', []));
        $document->landlords()->sync($request->input('landlords', []));
        $document->properties()->sync($request->input('properties', []));
        $document->units()->sync($request->input('units', []));

        return redirect()->route('admin.documents.index');
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->load('document_types', 'tenants', 'landlords', 'properties', 'units');

        return view('admin.documents.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        $documents = Document::find(request('ids'));

        foreach ($documents as $document) {
            $document->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function downloadDocument($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/documents/' . $document->file_path);

        return response()->download($filePath, $document->name);
    }

}
