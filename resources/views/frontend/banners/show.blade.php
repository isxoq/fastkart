@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.banner.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.banners.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $banner->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Banner::TYPE_SELECT[$banner->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($banner->photo)
                                            <a href="{{ $banner->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $banner->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.title_1') }}
                                    </th>
                                    <td>
                                        {{ $banner->title_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.title_2') }}
                                    </th>
                                    <td>
                                        {{ $banner->title_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.title_3') }}
                                    </th>
                                    <td>
                                        {{ $banner->title_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.title_4') }}
                                    </th>
                                    <td>
                                        {{ $banner->title_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.title_5') }}
                                    </th>
                                    <td>
                                        {{ $banner->title_5 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banner.fields.url') }}
                                    </th>
                                    <td>
                                        {{ $banner->url }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.banners.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection