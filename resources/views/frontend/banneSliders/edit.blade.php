@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.banneSlider.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.banne-sliders.update", [$banneSlider->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.banneSlider.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">{{ trans('cruds.banneSlider.fields.sort_order') }}</label>
                            <input class="form-control" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $banneSlider->sort_order) }}" step="1">
                            @if($errors->has('sort_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sort_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.sort_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_1">{{ trans('cruds.banneSlider.fields.title_1') }}</label>
                            <input class="form-control" type="text" name="title_1" id="title_1" value="{{ old('title_1', $banneSlider->title_1) }}">
                            @if($errors->has('title_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.title_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_2">{{ trans('cruds.banneSlider.fields.title_2') }}</label>
                            <input class="form-control" type="text" name="title_2" id="title_2" value="{{ old('title_2', $banneSlider->title_2) }}">
                            @if($errors->has('title_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.title_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_3">{{ trans('cruds.banneSlider.fields.title_3') }}</label>
                            <input class="form-control" type="text" name="title_3" id="title_3" value="{{ old('title_3', $banneSlider->title_3) }}">
                            @if($errors->has('title_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.title_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.banneSlider.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $banneSlider->url) }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.banneSlider.fields.url_helper') }}</span>
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
    url: '{{ route('frontend.banne-sliders.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 376,
      height: 231
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
@if(isset($banneSlider) && $banneSlider->photo)
      var file = {!! json_encode($banneSlider->photo) !!}
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