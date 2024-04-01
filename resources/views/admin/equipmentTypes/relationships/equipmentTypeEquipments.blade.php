<div class="m-3">
    @can('equipment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.equipments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.equipment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.equipment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-equipmentTypeEquipments">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.equipment_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.brand_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.model_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.serial_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.warranty_expiration') }}
                            </th>
                            <th>
                                {{ trans('cruds.equipment.fields.equipment_details') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipments as $key => $equipment)
                            <tr data-entry-id="{{ $equipment->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $equipment->id ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->name ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->equipment_type->name ?? '' }}
                                </td>
                                <td>
                                    @if($equipment->image)
                                        <a href="{{ $equipment->image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $equipment->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $equipment->brand_name ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->model_number ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->price ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->serial_number ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->warranty_expiration ?? '' }}
                                </td>
                                <td>
                                    {{ $equipment->equipment_details ?? '' }}
                                </td>
                                <td>
                                    @can('equipment_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.equipments.show', $equipment->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('equipment_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.equipments.edit', $equipment->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('equipment_delete')
                                        <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('equipment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.equipments.massDestroy') }}",
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
  let table = $('.datatable-equipmentTypeEquipments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection