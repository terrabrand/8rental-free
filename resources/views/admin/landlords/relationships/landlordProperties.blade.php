<div class="m-3">
    @can('property_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.properties.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.property.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.property.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-landlordProperties">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.property.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.property_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.landlord') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.main_image') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.property_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.location') }}
                            </th>
                            <th>
                                {{ trans('cruds.property.fields.more_images') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $key => $property)
                            <tr data-entry-id="{{ $property->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $property->id ?? '' }}
                                </td>
                                <td>
                                    {{ $property->property_name ?? '' }}
                                </td>
                                <td>
                                    {{ $property->landlord->name ?? '' }}
                                </td>
                                <td>
                                    @if($property->main_image)
                                        <a href="{{ $property->main_image->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ App\Models\Property::PROPERTY_TYPE_SELECT[$property->property_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $property->location ?? '' }}
                                </td>
                                <td>
                                    @foreach($property->more_images as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('property_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.properties.show', $property->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('property_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.properties.edit', $property->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('property_delete')
                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('property_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.properties.massDestroy') }}",
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
  let table = $('.datatable-landlordProperties:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection