@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banneSlider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banne-sliders.index') }}">
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
                            {{ trans('cruds.banneSlider.fields.content') }}
                        </th>
                        <td>
                            {!! $banneSlider->content !!}
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
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banne-sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection