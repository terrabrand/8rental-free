<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::with(['property_applying', 'unit_applying', 'tenant'])->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property_applyings = Property::pluck('property_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit_applyings = Unit::pluck('unit_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tenants = Tenant::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('property_applyings', 'tenants', 'unit_applyings'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property_applyings = Property::pluck('property_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit_applyings = Unit::pluck('unit_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tenants = Tenant::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('property_applying', 'unit_applying', 'tenant');

        return view('admin.applications.edit', compact('application', 'property_applyings', 'tenants', 'unit_applyings'));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('property_applying', 'unit_applying', 'tenant');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        $applications = Application::find(request('ids'));

        foreach ($applications as $application) {
            $application->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
