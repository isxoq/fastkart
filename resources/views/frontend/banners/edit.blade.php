@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.banner.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.banners.update", [$banner->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.banner.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Banner::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $banner->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.banner.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_1">{{ trans('cruds.banner.fields.title_1') }}</label>
                            <input class="form-control" type="text" name="title_1" id="title_1" value="{{ old('title_1', $banner->title_1) }}">
                            @if($errors->has('title_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.title_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_2">{{ trans('cruds.banner.fields.title_2') }}</label>
                            <input class="form-control" type="text" name="title_2" id="title_2" value="{{ old('title_2', $banner->title_2) }}">
                            @if($errors->has('title_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.title_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_3">{{ trans('cruds.banner.fields.title_3') }}</label>
                            <input class="form-control" type="text" name="title_3" id="title_3" value="{{ old('title_3', $banner->title_3) }}">
                            @if($errors->has('title_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.title_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_4">{{ trans('cruds.banner.fields.title_4') }}</label>
                            <input class="form-control" type="text" name="title_4" id="title_4" value="{{ old('title_4', $banner->title_4) }}">
                            @if($errors->has('title_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.title_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_5">{{ trans('cruds.banner.fields.title_5') }}</label>
                            <input class="form-control" type="text" name="title_5" id="title_5" value="{{ old('title_5', $banner->title_5) }}">
                            @if($errors->has('title_5'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_5') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.title_5_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.banner.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $banner->url) }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.url_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.banners.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 1155,
      height: 670
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($banner) && $banner->photo)
      var file = {!! json_encode($banner->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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