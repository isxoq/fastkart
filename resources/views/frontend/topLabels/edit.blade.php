@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.topLabel.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.top-labels.update", [$topLabel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="content">{{ trans('cruds.topLabel.fields.content') }}</label>
                            <textarea class="form-control" name="content" id="content">{{ old('content', $topLabel->content) }}</textarea>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.topLabel.fields.content_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">{{ trans('cruds.topLabel.fields.sort_order') }}</label>
                            <input class="form-control" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $topLabel->sort_order) }}" step="1">
                            @if($errors->has('sort_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sort_order') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection