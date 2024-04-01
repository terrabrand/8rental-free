@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.landlord.title') }}
    </div>

    <div class="card-body">
        <!-- Profile Header -->
        <div class="text-center mb-4">
        @if($landlord->image)
                                <div style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%; margin: 0 auto;">
                                    <a href="{{ $landlord->image->getUrl() }}" target="_blank" style="display: inline-block; width: 100%; height: 100%;">
                                        <img src="{{ $landlord->image->getUrl('') }}" style="object-fit: cover; width: 100%; height: 100%;" alt="Landlord Image">
                                    </a>
                                </div>
                            @endif
            <h2>{{ $landlord->name }}</h2>
            <p class="text-muted">{{ $landlord->email }}</p>
        </div>

        <!-- Profile Details Section -->
<!-- Profile Details Section - Centered -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>{{ trans('cruds.landlord.fields.id') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.name') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.company_name') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.phone_number') }}:</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $landlord->id }}</p>
                        <p>{{ $landlord->name }}</p>
                        <p>{{ $landlord->company_name }}</p>
                        <p>{{ $landlord->phone_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>{{ trans('cruds.landlord.fields.country') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.city') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.state') }}:</strong></p>
                        <p><strong>{{ trans('cruds.landlord.fields.email') }}:</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $landlord->country }}</p>
                        <p>{{ $landlord->city }}</p>
                        <p>{{ $landlord->state }}</p>
                        <p>{{ $landlord->email }}</p>
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
            <a class="nav-link" href="#landlord_properties" role="tab" data-toggle="tab">
                {{ trans('cruds.property.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#landlord_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#landlord_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.document.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#landlord_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="landlord_properties">
            @includeIf('admin.landlords.relationships.landlordProperties', ['properties' => $landlord->landlordProperties])
        </div>
        <div class="tab-pane" role="tabpanel" id="landlord_expenses">
            @includeIf('admin.landlords.relationships.landlordExpenses', ['expenses' => $landlord->landlordExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="landlord_documents">
            @includeIf('admin.landlords.relationships.landlordDocuments', ['documents' => $landlord->landlordDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="landlord_invoices">
            @includeIf('admin.landlords.relationships.landlordInvoices', ['invoices' => $landlord->landlordInvoices])
        </div>
    </div>
</div>

@endsection