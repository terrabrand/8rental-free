<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIncomeTypeRequest;
use App\Http\Requests\StoreIncomeTypeRequest;
use App\Http\Requests\UpdateIncomeTypeRequest;
use App\Models\IncomeType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncomeTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('income_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeTypes = IncomeType::all();

        return view('admin.incomeTypes.index', compact('incomeTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('income_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeTypes.create');
    }

    public function store(StoreIncomeTypeRequest $request)
    {
        $incomeType = IncomeType::create($request->all());

        return redirect()->route('admin.income-types.index');
    }

    public function edit(IncomeType $incomeType)
    {
        abort_if(Gate::denies('income_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeTypes.edit', compact('incomeType'));
    }

    public function update(UpdateIncomeTypeRequest $request, IncomeType $incomeType)
    {
        $incomeType->update($request->all());

        return redirect()->route('admin.income-types.index');
    }

    public function show(IncomeType $incomeType)
    {
        abort_if(Gate::denies('income_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeType->load('incomeTypeIncomes');

        return view('admin.incomeTypes.show', compact('incomeType'));
    }

    public function destroy(IncomeType $incomeType)
    {
        abort_if(Gate::denies('income_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeType->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeTypeRequest $request)
    {
        $incomeTypes = IncomeType::find(request('ids'));

        foreach ($incomeTypes as $incomeType) {
            $incomeType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
