@extends('layouts.admin')
@section('content')

<div class="container-fluid pt-3">
            <div class="row removable">
                <div class="col-lg-4">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src="{{ $property->main_image->getUrl() }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                            </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                            <p class="text-gradient text-dark mb-2 text-sm">{{ App\Models\Property::PROPERTY_TYPE_SELECT[$property->property_type] ?? '' }}</p>
                            <a href="javascript:;">
                                <h5>
                                {{ $property->property_name }}</h5>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="mb-0">Edit Property</h6>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("admin.properties.update", [$property->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <h6 class="heading-small text-muted mb-4">Property information</h6>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                <label class="required" for="property_name">{{ trans('cruds.property.fields.property_name') }}</label>
                <input class="form-control {{ $errors->has('property_name') ? 'is-invalid' : '' }}" type="text" name="property_name" id="property_name" value="{{ old('property_name', $property->property_name) }}" required>
                @if($errors->has('property_name'))
                    <span class="text-danger">{{ $errors->first('property_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.property_name_helper') }}</span>
            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                <label for="landlord_id">{{ trans('cruds.property.fields.landlord') }}</label>
                <select class="form-control select2 {{ $errors->has('landlord') ? 'is-invalid' : '' }}" name="landlord_id" id="landlord_id">
                    @foreach($landlords as $id => $entry)
                        <option value="{{ $id }}" {{ (old('landlord_id') ? old('landlord_id') : $property->landlord->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlord'))
                    <span class="text-danger">{{ $errors->first('landlord') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.landlord_helper') }}</span>
            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                <label for="location">{{ trans('cruds.property.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $property->location) }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.location_helper') }}</span>
            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                <label>{{ trans('cruds.property.fields.property_type') }}</label>
                <select class="form-control {{ $errors->has('property_type') ? 'is-invalid' : '' }}" name="property_type" id="property_type">
                    <option value disabled {{ old('property_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Property::PROPERTY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('property_type', $property->property_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_type'))
                    <span class="text-danger">{{ $errors->first('property_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.property_type_helper') }}</span>
            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark my-4">

                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                <label for="main_image">{{ trans('cruds.property.fields.main_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('main_image') ? 'is-invalid' : '' }}" id="main_image-dropzone">
                </div>
                @if($errors->has('main_image'))
                    <span class="text-danger">{{ $errors->first('main_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.main_image_helper') }}</span>
            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                <label for="more_images">{{ trans('cruds.property.fields.more_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('more_images') ? 'is-invalid' : '' }}" id="more_images-dropzone">
                </div>
                @if($errors->has('more_images'))
                    <span class="text-danger">{{ $errors->first('more_images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.property.fields.more_images_helper') }}</span>
            </div>
                                </div">
                                <div class="form-group">
                                
            </div>
            <button class="btn btn-sm bg-gradient-primary mb-0" type="submit">
                    {{ trans('global.save') }}
                </button>
            
            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

@section('scripts')
<script>
    Dropzone.options.mainImageDropzone = {
    url: '{{ route('admin.properties.storeMedia') }}',
    maxFilesize: 1, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1
    },
    success: function (file, response) {
      $('form').find('input[name="main_image"]').remove()
      $('form').append('<input type="hidden" name="main_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="main_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($property) && $property->main_image)
      var file = {!! json_encode($property->main_image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="main_image" value="' + file.file_name + '">')
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
    var uploadedMoreImagesMap = {}
Dropzone.options.moreImagesDropzone = {
    url: '{{ route('admin.properties.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="more_images[]" value="' + response.name + '">')
      uploadedMoreImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedMoreImagesMap[file.name]
      }
      $('form').find('input[name="more_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($property) && $property->more_images)
      var files = {!! json_encode($property->more_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="more_images[]" value="' + file.file_name + '">')
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
