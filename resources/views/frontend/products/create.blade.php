@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.products.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.product.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_description">{{ trans('cruds.product.fields.short_description') }}</label>
                            <textarea class="form-control" name="short_description" id="short_description">{{ old('short_description') }}</textarea>
                            @if($errors->has('short_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="card_photo">{{ trans('cruds.product.fields.card_photo') }}</label>
                            <div class="needsclick dropzone" id="card_photo-dropzone">
                            </div>
                            @if($errors->has('card_photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('card_photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.card_photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photos">{{ trans('cruds.product.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_sale" value="0">
                                <input type="checkbox" name="is_sale" id="is_sale" value="1" {{ old('is_sale', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_sale">{{ trans('cruds.product.fields.is_sale') }}</label>
                            </div>
                            @if($errors->has('is_sale'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_sale') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.is_sale_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sale_price">{{ trans('cruds.product.fields.sale_price') }}</label>
                            <input class="form-control" type="number" name="sale_price" id="sale_price" value="{{ old('sale_price', '') }}" step="0.01">
                            @if($errors->has('sale_price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sale_price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.sale_price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sale">{{ trans('cruds.product.fields.sale') }}</label>
                            <input class="form-control" type="number" name="sale" id="sale" value="{{ old('sale', '') }}" step="0.01">
                            @if($errors->has('sale'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sale') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.sale_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sale_start">{{ trans('cruds.product.fields.sale_start') }}</label>
                            <input class="form-control datetime" type="text" name="sale_start" id="sale_start" value="{{ old('sale_start') }}">
                            @if($errors->has('sale_start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sale_start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.sale_start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="end_sale">{{ trans('cruds.product.fields.end_sale') }}</label>
                            <input class="form-control datetime" type="text" name="end_sale" id="end_sale" value="{{ old('end_sale') }}">
                            @if($errors->has('end_sale'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_sale') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.end_sale_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" id="status" value="1" {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                                <label for="status">{{ trans('cruds.product.fields.status') }}</label>
                            </div>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.product.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                            @if($errors->has('meta_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ trans('cruds.product.fields.meta_description') }}</label>
                            <input class="form-control" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', '') }}">
                            @if($errors->has('meta_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.meta_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_tags">{{ trans('cruds.product.fields.meta_tags') }}</label>
                            <textarea class="form-control" name="meta_tags" id="meta_tags">{{ old('meta_tags') }}</textarea>
                            @if($errors->has('meta_tags'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_tags') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.meta_tags_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_trend" value="0">
                                <input type="checkbox" name="is_trend" id="is_trend" value="1" {{ old('is_trend', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_trend">{{ trans('cruds.product.fields.is_trend') }}</label>
                            </div>
                            @if($errors->has('is_trend'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_trend') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.is_trend_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.products.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $product->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.cardPhotoDropzone = {
    url: '{{ route('frontend.products.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 1024,
      height: 1024
    },
    success: function (file, response) {
      $('form').find('input[name="card_photo"]').remove()
      $('form').append('<input type="hidden" name="card_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="card_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->card_photo)
      var file = {!! json_encode($product->card_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="card_photo" value="' + file.file_name + '">')
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
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('frontend.products.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 750,
      height: 750
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->photos)
      var files = {!! json_encode($product->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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