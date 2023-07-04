@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.specialOffer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.special-offers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.id') }}
                        </th>
                        <td>
                            {{ $specialOffer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.photo') }}
                        </th>
                        <td>
                            @if($specialOffer->photo)
                                <a href="{{ $specialOffer->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $specialOffer->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.sort_order') }}
                        </th>
                        <td>
                            {{ $specialOffer->sort_order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.offer') }}
                        </th>
                        <td>
                            {{ $specialOffer->offer->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.title_1') }}
                        </th>
                        <td>
                            {{ $specialOffer->title_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialOffer.fields.title_2') }}
                        </th>
                        <td>
                            {{ $specialOffer->title_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.special-offers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection