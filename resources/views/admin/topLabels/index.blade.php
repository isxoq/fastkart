@extends('layouts.admin')
@section('content')
@can('top_label_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.top-labels.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.topLabel.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.topLabel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TopLabel">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.topLabel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.topLabel.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.topLabel.fields.sort_order') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topLabels as $key => $topLabel)
                        <tr data-entry-id="{{ $topLabel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $topLabel->id ?? '' }}
                            </td>
                            <td>
                                {{ $topLabel->title ?? '' }}
                            </td>
                            <td>
                                {{ $topLabel->sort_order ?? '' }}
                            </td>
                            <td>
                                @can('top_label_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.top-labels.show', $topLabel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('top_label_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.top-labels.edit', $topLabel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('top_label_delete')
                                    <form action="{{ route('admin.top-labels.destroy', $topLabel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('top_label_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.top-labels.massDestroy') }}",
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
  let table = $('.datatable-TopLabel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection