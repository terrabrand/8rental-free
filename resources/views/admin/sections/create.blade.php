@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="section_name">{{ trans('cruds.section.fields.section_name') }}</label>
                <input class="form-control {{ $errors->has('section_name') ? 'is-invalid' : '' }}" type="text" name="section_name" id="section_name" value="{{ old('section_name', '') }}" required>
                @if($errors->has('section_name'))
                    <span class="text-danger">{{ $errors->first('section_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="property_id">{{ trans('cruds.section.fields.property') }}</label>
                <select class="form-control select2 {{ $errors->has('property') ? 'is-invalid' : '' }}" name="property_id" id="property_id" required>
                    @foreach($properties as $id => $entry)
                        <option value="{{ $id }}" {{ old('property_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('property'))
                    <span class="text-danger">{{ $errors->first('property') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.property_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.section.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.description_helper') }}</span>
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