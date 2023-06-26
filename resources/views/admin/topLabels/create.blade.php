@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.topLabel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.top-labels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="content">{{ trans('cruds.topLabel.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.topLabel.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sort_order">{{ trans('cruds.topLabel.fields.sort_order') }}</label>
                <input class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', '1') }}" step="1">
                @if($errors->has('sort_order'))
                    <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.topLabel.fields.sort_order_helper') }}</span>
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