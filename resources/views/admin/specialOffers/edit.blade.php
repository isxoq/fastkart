@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.specialOffer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.special-offers.update", [$specialOffer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="photo">{{ trans('cruds.specialOffer.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialOffer.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sort_order">{{ trans('cruds.specialOffer.fields.sort_order') }}</label>
                <input class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $specialOffer->sort_order) }}" step="1">
                @if($errors->has('sort_order'))
                    <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialOffer.fields.sort_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_id">{{ trans('cruds.specialOffer.fields.offer') }}</label>
                <select class="form-control select2 {{ $errors->has('offer') ? 'is-invalid' : '' }}" name="offer_id" id="offer_id">
                    @foreach($offers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('offer_id') ? old('offer_id') : $specialOffer->offer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer'))
                    <span class="text-danger">{{ $errors->first('offer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialOffer.fields.offer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_1">{{ trans('cruds.specialOffer.fields.title_1') }}</label>
                <input class="form-control {{ $errors->has('title_1') ? 'is-invalid' : '' }}" type="text" name="title_1" id="title_1" value="{{ old('title_1', $specialOffer->title_1) }}">
                @if($errors->has('title_1'))
                    <span class="text-danger">{{ $errors->first('title_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialOffer.fields.title_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_2">{{ trans('cruds.specialOffer.fields.title_2') }}</label>
                <input class="form-control {{ $errors->has('title_2') ? 'is-invalid' : '' }}" type="text" name="title_2" id="title_2" value="{{ old('title_2', $specialOffer->title_2) }}">
                @if($errors->has('title_2'))
                    <span class="text-danger">{{ $errors->first('title_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialOffer.fields.title_2_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.special-offers.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 583,
      height: 157
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
@if(isset($specialOffer) && $specialOffer->photo)
      var file = {!! json_encode($specialOffer->photo) !!}
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