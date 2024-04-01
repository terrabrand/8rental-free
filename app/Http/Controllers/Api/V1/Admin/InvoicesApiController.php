<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\Admin\InvoiceResource;
use App\Models\Invoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoicesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceResource(Invoice::with(['tenants', 'landlords', 'invoice_types', 'properties', 'sections', 'units'])->get());
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());
        $invoice->tenants()->sync($request->input('tenants', []));
        $invoice->landlords()->sync($request->input('landlords', []));
        $invoice->invoice_types()->sync($request->input('invoice_types', []));
        $invoice->properties()->sync($request->input('properties', []));
        $invoice->sections()->sync($request->input('sections', []));
        $invoice->units()->sync($request->input('units', []));

        return (new InvoiceResource($invoice))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceResource($invoice->load(['tenants', 'landlords', 'invoice_types', 'properties', 'sections', 'units']));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());
        $invoice->tenants()->sync($request->input('tenants', []));
        $invoice->landlords()->sync($request->input('landlords', []));
        $invoice->invoice_types()->sync($request->input('invoice_types', []));
        $invoice->properties()->sync($request->input('properties', []));
        $invoice->sections()->sync($request->input('sections', []));
        $invoice->units()->sync($request->input('units', []));

        return (new InvoiceResource($invoice))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
