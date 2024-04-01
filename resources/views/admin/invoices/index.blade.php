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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INVOICE TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ $totalInvoices }}
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
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INVOICE PAID TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($totalsByStatus['Paid'] ?? 0, 2) }}
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
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INVOICE PARTIAL TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($totalsByStatus['Partial'] ?? 0, 2) }}
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
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INVOICE PENDING TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($totalsByStatus['Pending'] ?? 0, 2) }}
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
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">INVOICE OVERDUE TOTAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($totalsByStatus['Overdue'] ?? 0, 2) }}
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
                        <div>
    
</div>
                        

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>INVOICES CHART</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body">
                        <div class="{{ $chart14->options['column_class'] }}">
                            
                            {!! $chart14->renderHtml() !!}
                        </div>
    </div>
                    </div>
                </div>
            </div>
            
            @can('invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.invoices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Invoice', 'route' => 'admin.invoices.parseCsvImport'])
        </div>
    </div>
@endcan
            <div class="row removable">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>INVOICES LIST</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Due</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Percentage</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $key => $invoice)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-dashboard/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $invoice->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $invoice->amount ?? '' }}</p>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">{{ $invoice->date_due }}</span>
                                            </td>
                                            <td>
                                            @php
                $statusClass = '';
                switch ($invoice->status) {
                    case 'Partial':
                    case 'Pending':
                        $statusClass = 'bg-gradient-secondary';
                        break;
                    case 'Paid':
                        $statusClass = 'bg-gradient-success';
                        break;
                    case 'Overdue':
                        $statusClass = 'bg-gradient-danger';
                        break;
                    default:
                        $statusClass = '';
                        break;
                }
            @endphp
                                                <span class="badge badge-sm {{ $statusClass }}">{{ App\Models\Invoice::STATUS_SELECT[$invoice->status] ?? '' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">{{ $invoice->getPercentagePaidAttribute() }}%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="{{ $invoice->getPercentagePaidAttribute() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $invoice->getPercentagePaidAttribute() }}%;"></div>
                                                        </div>
                                                    </div>
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
            @if ($invoices->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $invoices->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $invoices->lastPage(); $page++)
                <li class="page-item {{ $invoices->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $invoices->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($invoices->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $invoices->nextPageUrl() }}" rel="next">&raquo;</a>
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
        {{ trans('cruds.invoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.tenant') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.landlord') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.property') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.section') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date_due') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.partial_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.tax') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date_paid') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($tenants as $key => $item)
                                    <option value="{{ $item->first_name }}">{{ $item->first_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($landlords as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($invoice_types as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($properties as $key => $item)
                                    <option value="{{ $item->property_name }}">{{ $item->property_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($sections as $key => $item)
                                    <option value="{{ $item->section_name }}">{{ $item->section_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($units as $key => $item)
                                    <option value="{{ $item->unit_name }}">{{ $item->unit_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Invoice::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->id ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->name ?? '' }}
                            </td>
                            <td>
                                @foreach($invoice->tenants as $key => $item)
                                    <span class="badge badge-info">{{ $item->first_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($invoice->landlords as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($invoice->invoice_types as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($invoice->properties as $key => $item)
                                    <span class="badge badge-info">{{ $item->property_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($invoice->sections as $key => $item)
                                    <span class="badge badge-info">{{ $item->section_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($invoice->units as $key => $item)
                                    <span class="badge badge-info">{{ $item->unit_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $invoice->invoice_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->date_due ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->partial_amount ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->amount ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->tax ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Invoice::STATUS_SELECT[$invoice->status] ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->date_paid ?? '' }}
                            </td>
                            <td>
                                @can('invoice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $invoice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.invoices.edit', $invoice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('invoice_delete')
                                    <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>{!! $chart14->renderJs() !!}
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.invoices.massDestroy') }}",
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
  let table = $('.datatable-Invoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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