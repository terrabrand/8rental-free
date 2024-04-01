@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="property_applying_id">{{ trans('cruds.application.fields.property_applying') }}</label>
                <select class="form-control select2 {{ $errors->has('property_applying') ? 'is-invalid' : '' }}" name="property_applying_id" id="property_applying_id" required>
                    @foreach($property_applyings as $id => $entry)
                        <option value="{{ $id }}" {{ old('property_applying_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_applying'))
                    <span class="text-danger">{{ $errors->first('property_applying') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.property_applying_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_applying_id">{{ trans('cruds.application.fields.unit_applying') }}</label>
                <select class="form-control select2 {{ $errors->has('unit_applying') ? 'is-invalid' : '' }}" name="unit_applying_id" id="unit_applying_id" required>
                    @foreach($unit_applyings as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_applying_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_applying'))
                    <span class="text-danger">{{ $errors->first('unit_applying') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.unit_applying_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tenant_id">{{ trans('cruds.application.fields.tenant') }}</label>
                <select class="form-control select2 {{ $errors->has('tenant') ? 'is-invalid' : '' }}" name="tenant_id" id="tenant_id">
                    @foreach($tenants as $id => $entry)
                        <option value="{{ $id }}" {{ old('tenant_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenant'))
                    <span class="text-danger">{{ $errors->first('tenant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.tenant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_intended_start">{{ trans('cruds.application.fields.date_of_intended_start') }}</label>
                <input class="form-control date {{ $errors->has('date_of_intended_start') ? 'is-invalid' : '' }}" type="text" name="date_of_intended_start" id="date_of_intended_start" value="{{ old('date_of_intended_start') }}">
                @if($errors->has('date_of_intended_start'))
                    <span class="text-danger">{{ $errors->first('date_of_intended_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.date_of_intended_start_helper') }}</span>
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