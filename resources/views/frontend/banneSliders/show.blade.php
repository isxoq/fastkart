@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.banneSlider.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.banne-sliders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($banneSlider->photo)
                                            <a href="{{ $banneSlider->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $banneSlider->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.sort_order') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->sort_order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_1') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->title_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_2') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->title_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_3') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->title_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.url') }}
                                    </th>
                                    <td>
                                        {{ $banneSlider->url }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.banne-sliders.index') }}">
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