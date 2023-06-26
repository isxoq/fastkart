@extends('layouts.admin')
@section('content')
@can('special_offer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.special-offers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.specialOffer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.specialOffer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SpecialOffer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.specialOffer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialOffer.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialOffer.fields.content') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialOffer.fields.sort_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialOffer.fields.offer') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($specialOffers as $key => $specialOffer)
                        <tr data-entry-id="{{ $specialOffer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $specialOffer->id ?? '' }}
                            </td>
                            <td>
                                @if($specialOffer->photo)
                                    <a href="{{ $specialOffer->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $specialOffer->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $specialOffer->content ?? '' }}
                            </td>
                            <td>
                                {{ $specialOffer->sort_order ?? '' }}
                            </td>
                            <td>
                                {{ $specialOffer->offer->title ?? '' }}
                            </td>
                            <td>
                                @can('special_offer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.special-offers.show', $specialOffer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('special_offer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.special-offers.edit', $specialOffer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('special_offer_delete')
                                    <form action="{{ route('admin.special-offers.destroy', $specialOffer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('special_offer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.special-offers.massDestroy') }}",
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
  let table = $('.datatable-SpecialOffer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection