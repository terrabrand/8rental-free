@extends('layouts.admin')
@section('content')

<div class="card p-3 mb-4">
@if($unit->cover_image)
<div class="overflow-hidden position-relative border rounded-lg" style="height: 480px;">
    <a href="{{ $unit->cover_image->getUrl() }}" target="_blank">
        <img src="{{ $unit->cover_image->getUrl() }}" class="img-fluid rounded-lg" style="object-fit: cover; width: 100%; height: 100%;" alt="unit Image">
    </a>
</div>
@endif

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="mb-0">Unit Information</h6>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('admin.units.edit', $unit) }}" class="btn btn-sm bg-gradient-primary mb-0">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">Unit Details</h6>
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Unit Name</label>
        <span id="input-username" class="form-control">{{ $unit->unit_name }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Section Name</label>
        <span id="input-username" class="form-control">{{ $unit->unit_section->section_name ?? '' }}</span>
    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Property Name</label>
        <span id="input-username" class="form-control">{{ $unit->property->property_name ?? '' }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Market Rent</label>
        <span id="input-username" class="form-control">{{ $unit->market_rent }}</span>
    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Unit Rent</label>
        <span id="input-username" class="form-control">{{ $unit->rent_price }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Unit Size</label>
        <span id="input-username" class="form-control">{{ $unit->unit_size }}</span>
    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Number of Bedrooms</label>
        <span id="input-username" class="form-control">{{ $unit->number_of_bedrooms }}</span>
    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
        <label class="form-control-label" for="input-username">Number of Bathrooms</label>
        <span id="input-username" class="form-control">{{ $unit->number_of_bathrooms }}</span>
    </div>
                                </div>
                           

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Number of Kitchens</label>
                                    <span id="input-username" class="form-control">{{ $unit->number_of_bedrooms }}</span>
                                    </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Deposit Amount</label>
                                            <span id="input-username" class="form-control">{{ $unit->deposit_amount }}</span>
                                        </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Parking Type</label>
                                            <span id="input-username" class="form-control">{{ App\Models\Unit::PARKING_TYPE_SELECT[$unit->parking_type] ?? '' }}</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Gallery</h6>
                        <div class="row">
    @foreach($unit->unit_images as $key => $media)
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



<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#unit_applying_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#unit_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#unit_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.document.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#unit_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="unit_applying_applications">
            @includeIf('admin.units.relationships.unitApplyingApplications', ['applications' => $unit->unitApplyingApplications])
        </div>
        <div class="tab-pane" role="tabpanel" id="unit_expenses">
            @includeIf('admin.units.relationships.unitExpenses', ['expenses' => $unit->unitExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="unit_documents">
            @includeIf('admin.units.relationships.unitDocuments', ['documents' => $unit->unitDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="unit_invoices">
            @includeIf('admin.units.relationships.unitInvoices', ['invoices' => $unit->unitInvoices])
        </div>
    </div>
</div>

@endsection