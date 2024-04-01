@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.invoice.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $invoice->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tenants">{{ trans('cruds.invoice.fields.tenant') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tenants') ? 'is-invalid' : '' }}" name="tenants[]" id="tenants" multiple required>
                    @foreach($tenants as $id => $tenant)
                        <option value="{{ $id }}" {{ (in_array($id, old('tenants', [])) || $invoice->tenants->contains($id)) ? 'selected' : '' }}>{{ $tenant }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenants'))
                    <span class="text-danger">{{ $errors->first('tenants') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.tenant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="landlords">{{ trans('cruds.invoice.fields.landlord') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('landlords') ? 'is-invalid' : '' }}" name="landlords[]" id="landlords" multiple>
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ (in_array($id, old('landlords', [])) || $invoice->landlords->contains($id)) ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlords'))
                    <span class="text-danger">{{ $errors->first('landlords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.landlord_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_types">{{ trans('cruds.invoice.fields.invoice_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('invoice_types') ? 'is-invalid' : '' }}" name="invoice_types[]" id="invoice_types" multiple>
                    @foreach($invoice_types as $id => $invoice_type)
                        <option value="{{ $id }}" {{ (in_array($id, old('invoice_types', [])) || $invoice->invoice_types->contains($id)) ? 'selected' : '' }}>{{ $invoice_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_types'))
                    <span class="text-danger">{{ $errors->first('invoice_types') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="properties">{{ trans('cruds.invoice.fields.property') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('properties') ? 'is-invalid' : '' }}" name="properties[]" id="properties" multiple>
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (in_array($id, old('properties', [])) || $invoice->properties->contains($id)) ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('properties'))
                    <span class="text-danger">{{ $errors->first('properties') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.property_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sections">{{ trans('cruds.invoice.fields.section') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sections') ? 'is-invalid' : '' }}" name="sections[]" id="sections" multiple>
                    @foreach($sections as $id => $section)
                        <option value="{{ $id }}" {{ (in_array($id, old('sections', [])) || $invoice->sections->contains($id)) ? 'selected' : '' }}>{{ $section }}</option>
                    @endforeach
                </select>
                @if($errors->has('sections'))
                    <span class="text-danger">{{ $errors->first('sections') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.section_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="units">{{ trans('cruds.invoice.fields.unit') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('units') ? 'is-invalid' : '' }}" name="units[]" id="units" multiple>
                    @foreach($units as $id => $unit)
                        <option value="{{ $id }}" {{ (in_array($id, old('units', [])) || $invoice->units->contains($id)) ? 'selected' : '' }}>{{ $unit }}</option>
                    @endforeach
                </select>
                @if($errors->has('units'))
                    <span class="text-danger">{{ $errors->first('units') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_number">{{ trans('cruds.invoice.fields.invoice_number') }}</label>
                <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $invoice->invoice_number) }}">
                @if($errors->has('invoice_number'))
                    <span class="text-danger">{{ $errors->first('invoice_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.invoice.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $invoice->date) }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_due">{{ trans('cruds.invoice.fields.date_due') }}</label>
                <input class="form-control date {{ $errors->has('date_due') ? 'is-invalid' : '' }}" type="text" name="date_due" id="date_due" value="{{ old('date_due', $invoice->date_due) }}">
                @if($errors->has('date_due'))
                    <span class="text-danger">{{ $errors->first('date_due') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_due_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partial_amount">{{ trans('cruds.invoice.fields.partial_amount') }}</label>
                <input class="form-control {{ $errors->has('partial_amount') ? 'is-invalid' : '' }}" type="number" name="partial_amount" id="partial_amount" value="{{ old('partial_amount', $invoice->partial_amount) }}" step="0.01">
                @if($errors->has('partial_amount'))
                    <span class="text-danger">{{ $errors->first('partial_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.partial_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.invoice.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $invoice->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.invoice.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $invoice->tax) }}" step="0.01">
                @if($errors->has('tax'))
                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.invoice.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Invoice::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $invoice->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_paid">{{ trans('cruds.invoice.fields.date_paid') }}</label>
                <input class="form-control date {{ $errors->has('date_paid') ? 'is-invalid' : '' }}" type="text" name="date_paid" id="date_paid" value="{{ old('date_paid', $invoice->date_paid) }}">
                @if($errors->has('date_paid'))
                    <span class="text-danger">{{ $errors->first('date_paid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection