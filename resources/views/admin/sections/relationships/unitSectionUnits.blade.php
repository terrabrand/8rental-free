<div class="m-3">
    @can('unit_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.units.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.unit.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.unit.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-unitSectionUnits">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.unit_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.property') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.unit_section') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.rent_price') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.unit_size') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.number_of_bedrooms') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.number_of_kitchens') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.number_of_bathrooms') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.market_rent') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.cover_image') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.deposit_amount') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.parking_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.unit_images') }}
                            </th>
                            <th>
                                {{ trans('cruds.unit.fields.notes') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $key => $unit)
                            <tr data-entry-id="{{ $unit->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $unit->id ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->unit_name ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->property->property_name ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->unit_section->section_name ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->rent_price ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->unit_size ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->number_of_bedrooms ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->number_of_kitchens ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->number_of_bathrooms ?? '' }}
                                </td>
                                <td>
                                    {{ $unit->market_rent ?? '' }}
                                </td>
                                <td>
                                    @if($unit->cover_image)
                                        <a href="{{ $unit->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $unit->cover_image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $unit->deposit_amount ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Unit::PARKING_TYPE_SELECT[$unit->parking_type] ?? '' }}
                                </td>
                                <td>
                                    @foreach($unit->unit_images as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $unit->notes ?? '' }}
                                </td>
                                <td>
                                    @can('unit_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.units.show', $unit->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('unit_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.units.edit', $unit->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('unit_delete')
                                        <form action="{{ route('admin.units.destroy', $unit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('unit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.units.massDestroy') }}",
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
  let table = $('.datatable-unitSectionUnits:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection