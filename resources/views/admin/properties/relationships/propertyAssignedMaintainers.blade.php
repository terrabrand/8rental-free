<div class="m-3">
    @can('maintainer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.maintainers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.maintainer.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.maintainer.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-propertyAssignedMaintainers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.phone_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.units_assigned') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.section_assigned') }}
                            </th>
                            <th>
                                {{ trans('cruds.maintainer.fields.property_assigned') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($maintainers as $key => $maintainer)
                            <tr data-entry-id="{{ $maintainer->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $maintainer->id ?? '' }}
                                </td>
                                <td>
                                    {{ $maintainer->name ?? '' }}
                                </td>
                                <td>
                                    @if($maintainer->image)
                                        <a href="{{ $maintainer->image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $maintainer->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $maintainer->phone_number ?? '' }}
                                </td>
                                <td>
                                    @foreach($maintainer->units_assigneds as $key => $item)
                                        <span class="badge badge-info">{{ $item->unit_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $maintainer->section_assigned->section_name ?? '' }}
                                </td>
                                <td>
                                    @foreach($maintainer->property_assigneds as $key => $item)
                                        <span class="badge badge-info">{{ $item->property_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('maintainer_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.maintainers.show', $maintainer->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('maintainer_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.maintainers.edit', $maintainer->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('maintainer_delete')
                                        <form action="{{ route('admin.maintainers.destroy', $maintainer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('maintainer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maintainers.massDestroy') }}",
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
  let table = $('.datatable-propertyAssignedMaintainers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection