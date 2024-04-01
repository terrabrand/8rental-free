<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\Admin\ExpenseResource;
use App\Models\Expense;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseResource(Expense::with(['landlords', 'properties', 'units', 'tenants', 'expense_types'])->get());
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->all());
        $expense->landlords()->sync($request->input('landlords', []));
        $expense->properties()->sync($request->input('properties', []));
        $expense->units()->sync($request->input('units', []));
        $expense->tenants()->sync($request->input('tenants', []));
        $expense->expense_types()->sync($request->input('expense_types', []));

        return (new ExpenseResource($expense))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseResource($expense->load(['landlords', 'properties', 'units', 'tenants', 'expense_types']));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->all());
        $expense->landlords()->sync($request->input('landlords', []));
        $expense->properties()->sync($request->input('properties', []));
        $expense->units()->sync($request->input('units', []));
        $expense->tenants()->sync($request->input('tenants', []));
        $expense->expense_types()->sync($request->input('expense_types', []));

        return (new ExpenseResource($expense))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
