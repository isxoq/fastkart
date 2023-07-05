@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dealToday.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deal-todays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dealToday.fields.id') }}
                        </th>
                        <td>
                            {{ $dealToday->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealToday.fields.product') }}
                        </th>
                        <td>
                            {{ $dealToday->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealToday.fields.color') }}
                        </th>
                        <td>
                            {{ $dealToday->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealToday.fields.sort_order') }}
                        </th>
                        <td>
                            {{ $dealToday->sort_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deal-todays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection