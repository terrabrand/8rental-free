@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.document.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.document.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="document_types">{{ trans('cruds.document.fields.document_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('document_types') ? 'is-invalid' : '' }}" name="document_types[]" id="document_types" multiple required>
                    @foreach($document_types as $id => $document_type)
                        <option value="{{ $id }}" {{ in_array($id, old('document_types', [])) ? 'selected' : '' }}>{{ $document_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('document_types'))
                    <span class="text-danger">{{ $errors->first('document_types') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.document_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tenants">{{ trans('cruds.document.fields.tenant') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tenants') ? 'is-invalid' : '' }}" name="tenants[]" id="tenants" multiple>
                    @foreach($tenants as $id => $tenant)
                        <option value="{{ $id }}" {{ in_array($id, old('tenants', [])) ? 'selected' : '' }}>{{ $tenant }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenants'))
                    <span class="text-danger">{{ $errors->first('tenants') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.tenant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="landlords">{{ trans('cruds.document.fields.landlord') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('landlords') ? 'is-invalid' : '' }}" name="landlords[]" id="landlords" multiple>
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ in_array($id, old('landlords', [])) ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlords'))
                    <span class="text-danger">{{ $errors->first('landlords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.landlord_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="properties">{{ trans('cruds.document.fields.property') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('properties') ? 'is-invalid' : '' }}" name="properties[]" id="properties" multiple>
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ in_array($id, old('properties', [])) ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('properties'))
                    <span class="text-danger">{{ $errors->first('properties') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.property_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="units">{{ trans('cruds.document.fields.unit') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('units') ? 'is-invalid' : '' }}" name="units[]" id="units" multiple>
                    @foreach($units as $id => $unit)
                        <option value="{{ $id }}" {{ in_array($id, old('units', [])) ? 'selected' : '' }}>{{ $unit }}</option>
                    @endforeach
                </select>
                @if($errors->has('units'))
                    <span class="text-danger">{{ $errors->first('units') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.unit_helper') }}</span>
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