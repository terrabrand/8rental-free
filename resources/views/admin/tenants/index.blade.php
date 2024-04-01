@extends('layouts.admin')

@section('content')
<div class="m-3">
    @can('tenant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tenants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tenant.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Tenant', 'route' => 'admin.tenants.parseCsvImport'])
        </div>
    </div>
    @endcan

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tenant.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($tenants as $key => $tenant)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="position-relative">
                            @if($tenant->image)
                            <a href="{{ route('admin.tenants.show', $tenant->id) }}" class="d-block shadow-xl border-radius-xl" style="height: 180px;">
                                <img src="{{ $tenant->image->getUrl('') }}" alt="tenantImage" class="img-fluid shadow border-radius-xl" style="object-fit: cover; width: 100%; height: 100%;">
                            </a>
                            @endif
                        </div>
                        <div class="card-body px-1 pb-0">
                            <p class="text-gradient text-dark mb-2 text-sm">Rent - {{ $tenant->monthly_gross_income ?? '' }} Bedrooms - {{ $tenant->number_of_bedrooms ?? '' }}</p>
                            <a href="{{ route('admin.tenants.show', $tenant->id) }}">
                                <h5>{{ $tenant->first_name ?? '' }}</h5>
                            </a>
                            <p class="mb-2 text-sm">Property - {{ $tenant->property->property_name ?? '' }}</p>

                            <div class="d-flex align-items-center justify-content-between">
                                <!-- View Button -->
                                @can('tenant_edit')
                                <button type="button" class="btn btn-link text-info mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.tenants.show', $tenant->id) }}'">
                                    <i class="fas fa-eye"></i> <!-- View Icon -->
                                </button>
                                @endcan
                                <!-- Edit Button -->
                                @can('tenant_edit')
                                <button type="button" class="btn btn-link text-info mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.tenants.edit', $tenant->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan

                                <!-- Delete Button -->
                                @can('tenant_delete')
                                <form id="delete-tenant-{{ $tenant->id }}" action="{{ route('admin.tenants.destroy', $tenant->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $tenant->id }}')">
                                        <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Pagination links -->
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($tenants->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $tenants->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $tenants->lastPage(); $page++)
                <li class="page-item {{ $tenants->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $tenants->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($tenants->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $tenants->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>

@endsection

@section('scripts')
@parent
<script>
    function confirmDelete(tenantId) {
        if (confirm("Are you sure you want to delete this tenant?")) {
            document.getElementById('delete-tenant-' + tenantId).submit();
        }
    }
</script>
@endsection
