@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contacts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="full_name">{{ trans('cruds.contact.fields.full_name') }}</label>
                            <input class="form-control" type="text" name="full_name" id="full_name" value="{{ old('full_name', '') }}">
                            @if($errors->has('full_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('full_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.full_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="profession">{{ trans('cruds.contact.fields.profession') }}</label>
                            <input class="form-control" type="text" name="profession" id="profession" value="{{ old('profession', '') }}">
                            @if($errors->has('profession'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profession') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.profession_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_description">{{ trans('cruds.contact.fields.short_description') }}</label>
                            <input class="form-control" type="text" name="short_description" id="short_description" value="{{ old('short_description', '') }}">
                            @if($errors->has('short_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.contact.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telegram">{{ trans('cruds.contact.fields.telegram') }}</label>
                            <input class="form-control" type="text" name="telegram" id="telegram" value="{{ old('telegram', '') }}">
                            @if($errors->has('telegram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telegram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.telegram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook">{{ trans('cruds.contact.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                            @if($errors->has('facebook'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram">{{ trans('cruds.contact.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">{{ trans('cruds.contact.fields.whatsapp') }}</label>
                            <input class="form-control" type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', '') }}">
                            @if($errors->has('whatsapp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('whatsapp') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.whatsapp_helper') }}</span>
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
    url: '{{ route('frontend.contacts.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
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
@if(isset($contact) && $contact->photo)
      var file = {!! json_encode($contact->photo) !!}
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