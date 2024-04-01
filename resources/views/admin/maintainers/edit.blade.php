@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.maintainer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.maintainers.update", [$maintainer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.maintainer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $maintainer->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.maintainer.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.maintainer.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $maintainer->phone_number) }}">
                @if($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="units_assigneds">{{ trans('cruds.maintainer.fields.units_assigned') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('units_assigneds') ? 'is-invalid' : '' }}" name="units_assigneds[]" id="units_assigneds" multiple>
                    @foreach($units_assigneds as $id => $units_assigned)
                        <option value="{{ $id }}" {{ (in_array($id, old('units_assigneds', [])) || $maintainer->units_assigneds->contains($id)) ? 'selected' : '' }}>{{ $units_assigned }}</option>
                    @endforeach
                </select>
                @if($errors->has('units_assigneds'))
                    <span class="text-danger">{{ $errors->first('units_assigneds') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.units_assigned_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="section_assigned_id">{{ trans('cruds.maintainer.fields.section_assigned') }}</label>
                <select class="form-control select2 {{ $errors->has('section_assigned') ? 'is-invalid' : '' }}" name="section_assigned_id" id="section_assigned_id">
                    @foreach($section_assigneds as $id => $entry)
                        <option value="{{ $id }}" {{ (old('section_assigned_id') ? old('section_assigned_id') : $maintainer->section_assigned->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('section_assigned'))
                    <span class="text-danger">{{ $errors->first('section_assigned') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.section_assigned_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="property_assigneds">{{ trans('cruds.maintainer.fields.property_assigned') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('property_assigneds') ? 'is-invalid' : '' }}" name="property_assigneds[]" id="property_assigneds" multiple>
                    @foreach($property_assigneds as $id => $property_assigned)
                        <option value="{{ $id }}" {{ (in_array($id, old('property_assigneds', [])) || $maintainer->property_assigneds->contains($id)) ? 'selected' : '' }}>{{ $property_assigned }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_assigneds'))
                    <span class="text-danger">{{ $errors->first('property_assigneds') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintainer.fields.property_assigned_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.maintainers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($maintainer) && $maintainer->image)
      var file = {!! json_encode($maintainer->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection