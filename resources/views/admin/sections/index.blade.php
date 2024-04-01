@extends('layouts.admin')
@section('content')
@can('section_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sections.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.section.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="row removable">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>SECTIONS LIST</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Property</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sections as $key => $section)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $section->section_name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $section->property->property_name ?? '' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                
                                                    <span class="me-2 text-xs font-weight-bold">{{ $section->description }}</span>
                                                    
                                                    
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                            <div class="d-flex">
                                <!-- Edit Button -->
                                @can('section_edit')
                                <button type="button" class="btn btn-link text-info mr-2" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.sections.edit', $section->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan
                                
                                <!-- Delete Button -->
                                @can('section_delete')
                                <form id="delete-section-{{ $section->id }}" action="{{ route('admin.sections.destroy', $section->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $section->id }}')">
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
    function confirmDelete(sectionId) {
        if (confirm("Are you sure you want to delete this section?")) {
            document.getElementById('delete-section-' + sectionId).submit();
        }
    }
</script>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('section_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sections.massDestroy') }}",
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
  let table = $('.datatable-Section:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection