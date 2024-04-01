@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.unit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="unit_name">{{ trans('cruds.unit.fields.unit_name') }}</label>
                <input class="form-control {{ $errors->has('unit_name') ? 'is-invalid' : '' }}" type="text" name="unit_name" id="unit_name" value="{{ old('unit_name', '') }}" required>
                @if($errors->has('unit_name'))
                    <span class="text-danger">{{ $errors->first('unit_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="property_id">{{ trans('cruds.unit.fields.property') }}</label>
                <select class="form-control select2 {{ $errors->has('property') ? 'is-invalid' : '' }}" name="property_id" id="property_id">
                    @foreach($properties as $id => $entry)
                        <option value="{{ $id }}" {{ old('property_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('property'))
                    <span class="text-danger">{{ $errors->first('property') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.property_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_section_id">{{ trans('cruds.unit.fields.unit_section') }}</label>
                <select class="form-control select2 {{ $errors->has('unit_section') ? 'is-invalid' : '' }}" name="unit_section_id" id="unit_section_id">
                    @foreach($unit_sections as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_section_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_section'))
                    <span class="text-danger">{{ $errors->first('unit_section') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_section_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rent_price">{{ trans('cruds.unit.fields.rent_price') }}</label>
                <input class="form-control {{ $errors->has('rent_price') ? 'is-invalid' : '' }}" type="number" name="rent_price" id="rent_price" value="{{ old('rent_price', '') }}" step="0.01" required>
                @if($errors->has('rent_price'))
                    <span class="text-danger">{{ $errors->first('rent_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.rent_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_size">{{ trans('cruds.unit.fields.unit_size') }}</label>
                <input class="form-control {{ $errors->has('unit_size') ? 'is-invalid' : '' }}" type="text" name="unit_size" id="unit_size" value="{{ old('unit_size', '') }}">
                @if($errors->has('unit_size'))
                    <span class="text-danger">{{ $errors->first('unit_size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_bedrooms">{{ trans('cruds.unit.fields.number_of_bedrooms') }}</label>
                <input class="form-control {{ $errors->has('number_of_bedrooms') ? 'is-invalid' : '' }}" type="number" name="number_of_bedrooms" id="number_of_bedrooms" value="{{ old('number_of_bedrooms', '') }}" step="1">
                @if($errors->has('number_of_bedrooms'))
                    <span class="text-danger">{{ $errors->first('number_of_bedrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.number_of_bedrooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_kitchens">{{ trans('cruds.unit.fields.number_of_kitchens') }}</label>
                <input class="form-control {{ $errors->has('number_of_kitchens') ? 'is-invalid' : '' }}" type="number" name="number_of_kitchens" id="number_of_kitchens" value="{{ old('number_of_kitchens', '') }}" step="1">
                @if($errors->has('number_of_kitchens'))
                    <span class="text-danger">{{ $errors->first('number_of_kitchens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.number_of_kitchens_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_bathrooms">{{ trans('cruds.unit.fields.number_of_bathrooms') }}</label>
                <input class="form-control {{ $errors->has('number_of_bathrooms') ? 'is-invalid' : '' }}" type="number" name="number_of_bathrooms" id="number_of_bathrooms" value="{{ old('number_of_bathrooms', '') }}" step="1">
                @if($errors->has('number_of_bathrooms'))
                    <span class="text-danger">{{ $errors->first('number_of_bathrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.number_of_bathrooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="market_rent">{{ trans('cruds.unit.fields.market_rent') }}</label>
                <input class="form-control {{ $errors->has('market_rent') ? 'is-invalid' : '' }}" type="number" name="market_rent" id="market_rent" value="{{ old('market_rent', '') }}" step="0.01">
                @if($errors->has('market_rent'))
                    <span class="text-danger">{{ $errors->first('market_rent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.market_rent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_image">{{ trans('cruds.unit.fields.cover_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_image') ? 'is-invalid' : '' }}" id="cover_image-dropzone">
                </div>
                @if($errors->has('cover_image'))
                    <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.cover_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deposit_amount">{{ trans('cruds.unit.fields.deposit_amount') }}</label>
                <input class="form-control {{ $errors->has('deposit_amount') ? 'is-invalid' : '' }}" type="number" name="deposit_amount" id="deposit_amount" value="{{ old('deposit_amount', '') }}" step="0.01">
                @if($errors->has('deposit_amount'))
                    <span class="text-danger">{{ $errors->first('deposit_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.deposit_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.unit.fields.parking_type') }}</label>
                <select class="form-control {{ $errors->has('parking_type') ? 'is-invalid' : '' }}" name="parking_type" id="parking_type">
                    <option value disabled {{ old('parking_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Unit::PARKING_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('parking_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('parking_type'))
                    <span class="text-danger">{{ $errors->first('parking_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.parking_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_images">{{ trans('cruds.unit.fields.unit_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('unit_images') ? 'is-invalid' : '' }}" id="unit_images-dropzone">
                </div>
                @if($errors->has('unit_images'))
                    <span class="text-danger">{{ $errors->first('unit_images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.unit.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.notes_helper') }}</span>
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
    Dropzone.options.coverImageDropzone = {
    url: '{{ route('admin.units.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_image"]').remove()
      $('form').append('<input type="hidden" name="cover_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($unit) && $unit->cover_image)
      var file = {!! json_encode($unit->cover_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_image" value="' + file.file_name + '">')
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
<script>
    var uploadedUnitImagesMap = {}
Dropzone.options.unitImagesDropzone = {
    url: '{{ route('admin.units.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="unit_images[]" value="' + response.name + '">')
      uploadedUnitImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedUnitImagesMap[file.name]
      }
      $('form').find('input[name="unit_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($unit) && $unit->unit_images)
      var files = {!! json_encode($unit->unit_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="unit_images[]" value="' + file.file_name + '">')
        }
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