@extends('layouts.admin')
@section('content')


<div class="card p-3 mb-4">
@if($property->main_image)
<div class="overflow-hidden position-relative border rounded-lg" style="height: 480px;">
    <a href="{{ $property->main_image->getUrl() }}" target="_blank">
        <img src="{{ $property->main_image->getUrl() }}" class="img-fluid rounded-lg" style="object-fit: cover; width: 100%; height: 100%;" alt="Property Image">
    </a>
</div>
@endif

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="mb-0">Property Information</h6>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm bg-gradient-primary mb-0">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">Property Details</h6>
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Property Name</label>
        <span id="input-username" class="form-control">{{ $property->property_name }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Landlord</label>
        <span id="input-username" class="form-control">{{ $property->landlord->name ?? '' }}</span>
    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Property Type</label>
        <span id="input-username" class="form-control">{{ App\Models\Property::PROPERTY_TYPE_SELECT[$property->property_type] ?? '' }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Location</label>
        <span id="input-username" class="form-control">{{ $property->location }}</span>
    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Gallery</h6>
                        <div class="row">
    @foreach($property->more_images as $key => $media)
    <div class="col-lg-4 mb-4">
        <div class="card">
            <a href="{{ $media->getUrl() }}" target="_blank">
                <img src="{{ $media->getUrl('') }}" class="card-img-top" alt="Image">
            </a>
            <div class="card-body">
                <p class="card-text">Image {{ $key + 1 }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
                    </form>
                </div>

            </div>

            <div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#property_tenants" role="tab" data-toggle="tab">
                {{ trans('cruds.tenant.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_applying_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_units" role="tab" data-toggle="tab">
                {{ trans('cruds.unit.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_sections" role="tab" data-toggle="tab">
                {{ trans('cruds.section.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_assigned_maintainers" role="tab" data-toggle="tab">
                {{ trans('cruds.maintainer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.document.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#property_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="property_tenants">
            @includeIf('admin.properties.relationships.propertyTenants', ['tenants' => $property->propertyTenants])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_applying_applications">
            @includeIf('admin.properties.relationships.propertyApplyingApplications', ['applications' => $property->propertyApplyingApplications])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_units">
            @includeIf('admin.properties.relationships.propertyUnits', ['units' => $property->propertyUnits])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_sections">
            @includeIf('admin.properties.relationships.propertySections', ['sections' => $property->propertySections])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_assigned_maintainers">
            @includeIf('admin.properties.relationships.propertyAssignedMaintainers', ['maintainers' => $property->propertyAssignedMaintainers])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_expenses">
            @includeIf('admin.properties.relationships.propertyExpenses', ['expenses' => $property->propertyExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_documents">
            @includeIf('admin.properties.relationships.propertyDocuments', ['documents' => $property->propertyDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="property_invoices">
            @includeIf('admin.properties.relationships.propertyInvoices', ['invoices' => $property->propertyInvoices])
        </div>
    </div>
</div>
        </div>



@endsection