<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInvoiceTypeRequest;
use App\Http\Requests\StoreInvoiceTypeRequest;
use App\Http\Requests\UpdateInvoiceTypeRequest;
use App\Models\InvoiceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('invoice_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTypes = InvoiceType::all();

        return view('admin.invoiceTypes.index', compact('invoiceTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTypes.create');
    }

    public function store(StoreInvoiceTypeRequest $request)
    {
        $invoiceType = InvoiceType::create($request->all());

        return redirect()->route('admin.invoice-types.index');
    }

    public function edit(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTypes.edit', compact('invoiceType'));
    }

    public function update(UpdateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        $invoiceType->update($request->all());

        return redirect()->route('admin.invoice-types.index');
    }

    public function show(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceType->load('invoiceTypeInvoices');

        return view('admin.invoiceTypes.show', compact('invoiceType'));
    }

    public function destroy(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceType->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceTypeRequest $request)
    {
        $invoiceTypes = InvoiceType::find(request('ids'));

        foreach ($invoiceTypes as $invoiceType) {
            $invoiceType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
