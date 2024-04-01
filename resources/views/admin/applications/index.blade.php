@extends('layouts.admin')
@section('content')
@can('application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Application', 'route' => 'admin.applications.parseCsvImport'])
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
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenant</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Property</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Unit</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Date of Occupation</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applications as $key => $application)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $application->tenant->first_name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $application->property_applying->property_name ?? '' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                
                                                    <span class="me-2 text-xs font-weight-bold">{{ $application->unit_applying->unit_name ?? '' }}</span>
                                                    
                                                    
                                                </div>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-xs font-weight-bold">{{ $application->date_of_intended_start }}</span>
                                                </div>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-xs font-weight-bold">Pending</span>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                            <div class="d-flex">
                                <!-- Edit Button -->
                                @can('section_edit')
                                <button type="button" class="btn btn-link text-info mr-2" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.applications.edit', $application->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan
                                
                                <!-- Delete Button -->
                                @can('section_delete')
                                <form id="delete-section-{{ $application->id }}" action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $application->id }}')">
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
    function confirmDelete(applicationId) {
        if (confirm("Are you sure you want to delete this application?")) {
            document.getElementById('delete-application-' + applicationId).submit();
        }
    }
</script>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
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
  let table = $('.datatable-Application:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection