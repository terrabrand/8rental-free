<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Http\Resources\Admin\ExpenseTypeResource;
use App\Models\ExpenseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpenseTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expense_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseTypeResource(ExpenseType::all());
    }

    public function store(StoreExpenseTypeRequest $request)
    {
        $expenseType = ExpenseType::create($request->all());

        return (new ExpenseTypeResource($expenseType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenseTypeResource($expenseType);
    }

    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());

        return (new ExpenseTypeResource($expenseType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
