<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyExpenseTypeRequest;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Models\ExpenseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpenseTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('expense_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseTypes = ExpenseType::all();

        return view('admin.expenseTypes.index', compact('expenseTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.create');
    }

    public function store(StoreExpenseTypeRequest $request)
    {
        $expenseType = ExpenseType::create($request->all());

        return redirect()->route('admin.expense-types.index');
    }

    public function edit(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.edit', compact('expenseType'));
    }

    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());

        return redirect()->route('admin.expense-types.index');
    }

    public function show(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.show', compact('expenseType'));
    }

    public function destroy(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseType->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseTypeRequest $request)
    {
        $expenseTypes = ExpenseType::find(request('ids'));

        foreach ($expenseTypes as $expenseType) {
            $expenseType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
