<div class="m-3">
    @can('expense_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.expenses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.expense.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.expense.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-tenantExpenses">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.landlord') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.property') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.unit') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.tenant') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.responsible') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.expense_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.amount') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.expense.fields.date_of_expense') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $key => $expense)
                            <tr data-entry-id="{{ $expense->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $expense->id ?? '' }}
                                </td>
                                <td>
                                    {{ $expense->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($expense->landlords as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($expense->properties as $key => $item)
                                        <span class="badge badge-info">{{ $item->property_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($expense->units as $key => $item)
                                        <span class="badge badge-info">{{ $item->unit_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($expense->tenants as $key => $item)
                                        <span class="badge badge-info">{{ $item->first_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ App\Models\Expense::RESPONSIBLE_SELECT[$expense->responsible] ?? '' }}
                                </td>
                                <td>
                                    @foreach($expense->expense_types as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $expense->description ?? '' }}
                                </td>
                                <td>
                                    {{ $expense->amount ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Expense::STATUS_SELECT[$expense->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $expense->date_of_expense ?? '' }}
                                </td>
                                <td>
                                    @can('expense_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.expenses.show', $expense->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('expense_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.expenses.edit', $expense->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('expense_delete')
                                        <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('expense_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expenses.massDestroy') }}",
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
  let table = $('.datatable-tenantExpenses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection