@extends('layouts.admin')
@section('content')
@can('deal_today_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.deal-todays.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dealToday.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dealToday.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DealToday">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dealToday.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealToday.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealToday.fields.color') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealToday.fields.sort_order') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dealTodays as $key => $dealToday)
                        <tr data-entry-id="{{ $dealToday->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dealToday->id ?? '' }}
                            </td>
                            <td>
                                {{ $dealToday->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $dealToday->color ?? '' }}
                            </td>
                            <td>
                                {{ $dealToday->sort_order ?? '' }}
                            </td>
                            <td>
                                @can('deal_today_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.deal-todays.show', $dealToday->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('deal_today_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.deal-todays.edit', $dealToday->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('deal_today_delete')
                                    <form action="{{ route('admin.deal-todays.destroy', $dealToday->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('deal_today_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.deal-todays.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-DealToday:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection