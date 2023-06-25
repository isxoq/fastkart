@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.deal.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.deals.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="product_id">{{ trans('cruds.deal.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id">
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deal.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="begin">{{ trans('cruds.deal.fields.begin') }}</label>
                            <input class="form-control datetime" type="text" name="begin" id="begin" value="{{ old('begin') }}">
                            @if($errors->has('begin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('begin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deal.fields.begin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="end">{{ trans('cruds.deal.fields.end') }}</label>
                            <input class="form-control datetime" type="text" name="end" id="end" value="{{ old('end') }}">
                            @if($errors->has('end'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.deal.fields.end_helper') }}</span>
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