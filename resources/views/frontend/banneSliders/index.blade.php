@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('banne_slider_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.banne-sliders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.banneSlider.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.banneSlider.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BanneSlider">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.sort_order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.title_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.banneSlider.fields.url') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banneSliders as $key => $banneSlider)
                                    <tr data-entry-id="{{ $banneSlider->id }}">
                                        <td>
                                            {{ $banneSlider->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($banneSlider->photo)
                                                <a href="{{ $banneSlider->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $banneSlider->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $banneSlider->sort_order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $banneSlider->title_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $banneSlider->title_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $banneSlider->title_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $banneSlider->url ?? '' }}
                                        </td>
                                        <td>
                                            @can('banne_slider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.banne-sliders.show', $banneSlider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('banne_slider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.banne-sliders.edit', $banneSlider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('banne_slider_delete')
                                                <form action="{{ route('frontend.banne-sliders.destroy', $banneSlider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('banne_slider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.banne-sliders.massDestroy') }}",
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
  let table = $('.datatable-BanneSlider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection