@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.equipments.update", [$equipment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.equipment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $equipment->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="equipment_type_id">{{ trans('cruds.equipment.fields.equipment_type') }}</label>
                <select class="form-control select2 {{ $errors->has('equipment_type') ? 'is-invalid' : '' }}" name="equipment_type_id" id="equipment_type_id">
                    @foreach($equipment_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('equipment_type_id') ? old('equipment_type_id') : $equipment->equipment_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('equipment_type'))
                    <span class="text-danger">{{ $errors->first('equipment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.equipment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.equipment.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_name">{{ trans('cruds.equipment.fields.brand_name') }}</label>
                <input class="form-control {{ $errors->has('brand_name') ? 'is-invalid' : '' }}" type="text" name="brand_name" id="brand_name" value="{{ old('brand_name', $equipment->brand_name) }}">
                @if($errors->has('brand_name'))
                    <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.brand_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model_number">{{ trans('cruds.equipment.fields.model_number') }}</label>
                <input class="form-control {{ $errors->has('model_number') ? 'is-invalid' : '' }}" type="text" name="model_number" id="model_number" value="{{ old('model_number', $equipment->model_number) }}">
                @if($errors->has('model_number'))
                    <span class="text-danger">{{ $errors->first('model_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.model_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.equipment.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $equipment->price) }}" step="0.01">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial_number">{{ trans('cruds.equipment.fields.serial_number') }}</label>
                <input class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', $equipment->serial_number) }}">
                @if($errors->has('serial_number'))
                    <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.serial_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="warranty_expiration">{{ trans('cruds.equipment.fields.warranty_expiration') }}</label>
                <input class="form-control date {{ $errors->has('warranty_expiration') ? 'is-invalid' : '' }}" type="text" name="warranty_expiration" id="warranty_expiration" value="{{ old('warranty_expiration', $equipment->warranty_expiration) }}">
                @if($errors->has('warranty_expiration'))
                    <span class="text-danger">{{ $errors->first('warranty_expiration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.warranty_expiration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="equipment_details">{{ trans('cruds.equipment.fields.equipment_details') }}</label>
                <textarea class="form-control {{ $errors->has('equipment_details') ? 'is-invalid' : '' }}" name="equipment_details" id="equipment_details">{{ old('equipment_details', $equipment->equipment_details) }}</textarea>
                @if($errors->has('equipment_details'))
                    <span class="text-danger">{{ $errors->first('equipment_details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipment.fields.equipment_details_helper') }}</span>
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
    url: '{{ route('admin.equipments.storeMedia') }}',
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
@if(isset($equipment) && $equipment->image)
      var file = {!! json_encode($equipment->image) !!}
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