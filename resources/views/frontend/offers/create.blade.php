@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.offer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.offers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.offer.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_description">{{ trans('cruds.offer.fields.short_description') }}</label>
                            <input class="form-control" type="text" name="short_description" id="short_description" value="{{ old('short_description', '') }}">
                            @if($errors->has('short_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.short_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="products">{{ trans('cruds.offer.fields.products') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.products_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sort_order">{{ trans('cruds.offer.fields.sort_order') }}</label>
                            <input class="form-control" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', '1') }}" step="1">
                            @if($errors->has('sort_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sort_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.sort_order_helper') }}</span>
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