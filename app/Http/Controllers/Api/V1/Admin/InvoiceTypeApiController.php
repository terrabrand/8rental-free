<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceTypeRequest;
use App\Http\Requests\UpdateInvoiceTypeRequest;
use App\Http\Resources\Admin\InvoiceTypeResource;
use App\Models\InvoiceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceTypeResource(InvoiceType::all());
    }

    public function store(StoreInvoiceTypeRequest $request)
    {
        $invoiceType = InvoiceType::create($request->all());

        return (new InvoiceTypeResource($invoiceType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceTypeResource($invoiceType);
    }

    public function update(UpdateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        $invoiceType->update($request->all());

        return (new InvoiceTypeResource($invoiceType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
