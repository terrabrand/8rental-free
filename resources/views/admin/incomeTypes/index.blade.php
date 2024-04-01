@extends('layouts.admin')
@section('content')
@can('income_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.income-types.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.incomeType.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'IncomeType', 'route' => 'admin.income-types.parseCsvImport'])
        </div>
    </div>
@endcan

<div class="row removable">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>LIST</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incomeTypes as $key => $incomeType)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $incomeType->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="align-middle">
                                            <div class="d-flex">
                                            @can('document_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.income-types.show', $incomeType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                <!-- Edit Button -->
                                @can('section_edit')
                                <button type="button" class="btn btn-link text-info mr-2" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.income-types.edit', $incomeType->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan
                                
                                <!-- Delete Button -->
                                @can('section_delete')
                                <form id="delete-section-{{ $incomeType->id }}" action="{{ route('admin.equipment-types.destroy', $incomeType->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $incomeType->id }}')">
                                        <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                                @endcan
                            </div>
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



    <script>
    function confirmDelete(incomeTypeId) {
        if (confirm("Are you sure you want to delete this incomeType?")) {
            document.getElementById('delete-incomeType-' + incomeTypeId).submit();
        }
    }
</script>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.incomeType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-IncomeType">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.incomeType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.incomeType.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomeTypes as $key => $incomeType)
                        <tr data-entry-id="{{ $incomeType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $incomeType->id ?? '' }}
                            </td>
                            <td>
                                {{ $incomeType->name ?? '' }}
                            </td>
                            <td>
                                @can('income_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.income-types.show', $incomeType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('income_type_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.income-types.edit', $incomeType->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('income_type_delete')
                                    <form action="{{ route('admin.income-types.destroy', $incomeType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('income_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.income-types.massDestroy') }}",
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
  let table = $('.datatable-IncomeType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection