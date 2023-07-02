@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.deal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.deals.update", [$deal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.deal.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $deal->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deal.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="begin">{{ trans('cruds.deal.fields.begin') }}</label>
                <input class="form-control datetime {{ $errors->has('begin') ? 'is-invalid' : '' }}" type="text" name="begin" id="begin" value="{{ old('begin', $deal->begin) }}">
                @if($errors->has('begin'))
                    <span class="text-danger">{{ $errors->first('begin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deal.fields.begin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end">{{ trans('cruds.deal.fields.end') }}</label>
                <input class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end', $deal->end) }}">
                @if($errors->has('end'))
                    <span class="text-danger">{{ $errors->first('end') }}</span>
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



@endsection