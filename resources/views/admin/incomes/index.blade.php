@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-3">
            <div class="row removable">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INCOME TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ $totalIncome }}
                                            <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <div class="row removable">
                <div class="col-lg-12">
                    <div class="row mb-4 removable">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-7">

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>INCOME CHART</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                        <div class="{{ $chart13->options['column_class'] }}">
                            
                            {!! $chart13->renderHtml() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @can('income_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.incomes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.income.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Income', 'route' => 'admin.incomes.parseCsvImport'])
        </div>
    </div>
@endcan
            <div class="row removable">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>INCOME LIST</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Type</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incomes as $key => $income)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-dashboard/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $income->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $income->amount }}</p>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $income->date_of_income }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{ $income->income_type->name ?? '' }}</span>
                                                    
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
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
        </div>




<!-- Pagination links -->
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($incomes->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $incomes->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $incomes->lastPage(); $page++)
                <li class="page-item {{ $incomes->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $incomes->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($incomes->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $incomes->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.income.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.income.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.income_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.income.fields.date_of_income') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomes as $key => $income)
                        <tr data-entry-id="{{ $income->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $income->id ?? '' }}
                            </td>
                            <td>
                                {{ $income->name ?? '' }}
                            </td>
                            <td>
                                {{ $income->income_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $income->amount ?? '' }}
                            </td>
                            <td>
                                {{ $income->date_of_income ?? '' }}
                            </td>
                            <td>
                                @can('income_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.incomes.show', $income->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('income_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.incomes.edit', $income->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('income_delete')
                                    <form action="{{ route('admin.incomes.destroy', $income->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>{!! $chart13->renderJs() !!}
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('income_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.incomes.massDestroy') }}",
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
  let table = $('.datatable-Income:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection