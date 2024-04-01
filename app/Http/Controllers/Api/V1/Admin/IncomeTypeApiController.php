<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeTypeRequest;
use App\Http\Requests\UpdateIncomeTypeRequest;
use App\Http\Resources\Admin\IncomeTypeResource;
use App\Models\IncomeType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncomeTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('income_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncomeTypeResource(IncomeType::all());
    }

    public function store(StoreIncomeTypeRequest $request)
    {
        $incomeType = IncomeType::create($request->all());

        return (new IncomeTypeResource($incomeType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IncomeType $incomeType)
    {
        abort_if(Gate::denies('income_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncomeTypeResource($incomeType);
    }

    public function update(UpdateIncomeTypeRequest $request, IncomeType $incomeType)
    {
        $incomeType->update($request->all());

        return (new IncomeTypeResource($incomeType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IncomeType $incomeType)
    {
        abort_if(Gate::denies('income_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
