@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.topLabel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-labels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.topLabel.fields.id') }}
                        </th>
                        <td>
                            {{ $topLabel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topLabel.fields.content') }}
                        </th>
                        <td>
                            {!! $topLabel->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topLabel.fields.sort_order') }}
                        </th>
                        <td>
                            {{ $topLabel->sort_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-labels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection