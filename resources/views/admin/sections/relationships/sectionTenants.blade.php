<div class="m-3">
    @can('tenant_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tenants.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.tenant.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tenant.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-sectionTenants">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.property') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.section') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.unit') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.first_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.id_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.id_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.monthly_gross_income') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.additional_income') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.date_of_birth') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.marital_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.ethnicity') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.country') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.state') }}
                            </th>
                            <th>
                                {{ trans('cruds.tenant.fields.notes') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tenants as $key => $tenant)
                            <tr data-entry-id="{{ $tenant->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $tenant->id ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->property->property_name ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->section->section_name ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->unit->unit_name ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Tenant::ID_TYPE_SELECT[$tenant->id_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->id_number ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Tenant::STATUS_SELECT[$tenant->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->monthly_gross_income ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->additional_income ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Tenant::GENDER_SELECT[$tenant->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Tenant::MARITAL_STATUS_SELECT[$tenant->marital_status] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Tenant::ETHNICITY_SELECT[$tenant->ethnicity] ?? '' }}
                                </td>
                                <td>
                                    @if($tenant->image)
                                        <a href="{{ $tenant->image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $tenant->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $tenant->country ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->city ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->state ?? '' }}
                                </td>
                                <td>
                                    {{ $tenant->notes ?? '' }}
                                </td>
                                <td>
                                    @can('tenant_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tenants.show', $tenant->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('tenant_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.tenants.edit', $tenant->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('tenant_delete')
                                        <form action="{{ route('admin.tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tenant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tenants.massDestroy') }}",
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
  let table = $('.datatable-sectionTenants:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection