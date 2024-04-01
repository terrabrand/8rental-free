@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tenant.title') }}
    </div>

    <div class="card-body">
        <div class="text-center mb-4">
            @if($tenant->image)
                <div style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%; margin: 0 auto;">
                    <a href="{{ $tenant->image->getUrl() }}" target="_blank" style="display: inline-block; width: 100%; height: 100%;">
                        <img src="{{ $tenant->image->getUrl('') }}" style="object-fit: cover; width: 100%; height: 100%;" alt="Tenant Image">
                    </a>
                </div>
            @endif
            <h2>{{ $tenant->first_name }}</h2>
            <p class="text-muted">{{ $tenant->email }}</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>{{ trans('cruds.tenant.fields.id') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.property') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.section') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.unit') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.first_name') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.date_of_birth') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.gender') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.marital_status') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.ethnicity') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.id_type') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.id_number') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.status') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.monthly_gross_income') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.additional_income') }}:</strong></p>

                                <p><strong>{{ trans('cruds.tenant.fields.country') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.city') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.state') }}:</strong></p>
                                <p><strong>{{ trans('cruds.tenant.fields.notes') }}:</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $tenant->id }}</p>
                                <p>{{ $tenant->property->property_name ?? 'none' }}</p>
                                <p>{{ $tenant->section->section_name ?? 'none' }}</p>
                                <p>{{ $tenant->unit->unit_name ?? 'none' }}</p>

                                <p>{{ $tenant->first_name ?? 'not selected' }}</p>
                                <p>{{ $tenant->date_of_birth ?? 'not selected' }}</p>

                                <p>{{ App\Models\Tenant::GENDER_SELECT[$tenant->gender] ?? 'not selected' }}</p>
                                <p>{{ App\Models\Tenant::MARITAL_STATUS_SELECT[$tenant->marital_status] ?? 'not selected' }}</p>

                                <p>{{ App\Models\Tenant::ETHNICITY_SELECT[$tenant->ethnicity] ?? 'not selected' }}</p>

                                <p>{{ App\Models\Tenant::ID_TYPE_SELECT[$tenant->id_type] ?? 'not selected' }}</p>
                                <p>{{ $tenant->id_number }}</p>

                                <p>{{ App\Models\Tenant::STATUS_SELECT[$tenant->status] ?? '' }}</p>
                                <p>{{ $tenant->monthly_gross_income ?? 'none' }}</p>
                                <p>{{ $tenant->additional_income ?? 'none' }}</p>

                                <p>{{ $tenant->country ?? 'not selected' }}</p>
                                <p>{{ $tenant->city ?? 'not selected' }}</p>
                                <p>{{ $tenant->state ?? 'not selected' }}</p>
                                <p>{{ $tenant->notes ?? 'not selected' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#tenant_applications" role="tab" data-toggle="tab">
                        {{ trans('cruds.application.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tenant_expenses" role="tab" data-toggle="tab">
                        {{ trans('cruds.expense.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tenant_documents" role="tab" data-toggle="tab">
                        {{ trans('cruds.document.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tenant_invoices" role="tab" data-toggle="tab">
                        {{ trans('cruds.invoice.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" role="tabpanel" id="tenant_applications">
                    @includeIf('admin.tenants.relationships.tenantApplications', ['applications' => $tenant->tenantApplications])
                </div>
                <div class="tab-pane" role="tabpanel" id="tenant_expenses">
                    @includeIf('admin.tenants.relationships.tenantExpenses', ['expenses' => $tenant->tenantExpenses])
                </div>
                <div class="tab-pane" role="tabpanel" id="tenant_documents">
                    @includeIf('admin.tenants.relationships.tenantDocuments', ['documents' => $tenant->tenantDocuments])
                </div>
                <div class="tab-pane" role="tabpanel" id="tenant_invoices">
                    @includeIf('admin.tenants.relationships.tenantInvoices', ['invoices' => $tenant->tenantInvoices])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
