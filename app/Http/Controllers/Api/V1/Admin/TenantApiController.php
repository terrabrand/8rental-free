<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Resources\Admin\TenantResource;
use App\Models\Tenant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tenant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TenantResource(Tenant::with(['property', 'section', 'unit'])->get());
    }

    public function store(StoreTenantRequest $request)
    {
        $tenant = Tenant::create($request->all());

        if ($request->input('image', false)) {
            $tenant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new TenantResource($tenant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tenant $tenant)
    {
        abort_if(Gate::denies('tenant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TenantResource($tenant->load(['property', 'section', 'unit']));
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $tenant->update($request->all());

        if ($request->input('image', false)) {
            if (! $tenant->image || $request->input('image') !== $tenant->image->file_name) {
                if ($tenant->image) {
                    $tenant->image->delete();
                }
                $tenant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($tenant->image) {
            $tenant->image->delete();
        }

        return (new TenantResource($tenant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tenant $tenant)
    {
        abort_if(Gate::denies('tenant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tenant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
