@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deal.fields.id') }}
                        </th>
                        <td>
                            {{ $deal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deal.fields.product') }}
                        </th>
                        <td>
                            {{ $deal->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deal.fields.begin') }}
                        </th>
                        <td>
                            {{ $deal->begin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deal.fields.end') }}
                        </th>
                        <td>
                            {{ $deal->end }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection