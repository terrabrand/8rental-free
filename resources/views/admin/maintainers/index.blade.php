@extends('layouts.admin')

@section('content')
<div class="m-3">
    @can('maintainer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.maintainers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.maintainer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Maintainer', 'route' => 'admin.maintainers.parseCsvImport'])
        </div>
    </div>
    @endcan

    <div class="row">
        @foreach($maintainers as $key => $maintainer)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="position-relative">
                    @if($maintainer->image)
                    <a href="{{ route('admin.maintainers.show', $maintainer->id) }}" class="d-block shadow-xl border-radius-xl" style="height: 180px;">
                        <img src="{{ $maintainer->image->getUrl('') }}" alt="{{ $maintainer->name }}" class="img-fluid shadow border-radius-xl" style="object-fit: cover; width: 100%; height: 100%;">
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <p class="text-gradient text-dark mb-2 text-sm">ID: {{ $maintainer->id ?? '' }}</p>
                    <a href="{{ route('admin.maintainers.show', $maintainer->id) }}">
                        <h5>{{ $maintainer->name ?? '' }}</h5>
                    </a>
                    <p class="mb-2 text-sm">{{ trans('cruds.maintainer.fields.phone_number') }}: {{ $maintainer->phone_number ?? '' }}</p>
                    <p class="mb-2 text-sm">{{ trans('cruds.maintainer.fields.units_assigned') }}: 
                        @foreach($maintainer->units_assigneds as $key => $item)
                        <span class="badge badge-info">{{ $item->unit_name }}</span>
                        @endforeach
                    </p>
                    <p class="mb-2 text-sm">{{ trans('cruds.maintainer.fields.section_assigned') }}: {{ $maintainer->section_assigned->section_name ?? '' }}</p>
                    <p class="mb-2 text-sm">{{ trans('cruds.maintainer.fields.property_assigned') }}:
                        @foreach($maintainer->property_assigneds as $key => $item)
                        <span class="badge badge-info">{{ $item->property_name }}</span>
                        @endforeach
                    </p>
                </div>
                <div class="card-footer">
                    @can('maintainer_show')
                    <a class="btn btn-primary" href="{{ route('admin.maintainers.show', $maintainer->id) }}">
                        {{ trans('global.view') }}
                    </a>
                    @endcan

                    @can('maintainer_edit')
                    <a class="btn btn-info" href="{{ route('admin.maintainers.edit', $maintainer->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                    @endcan

                    @can('maintainer_delete')
                    <form id="delete-maintainer-{{ $maintainer->id }}" action="{{ route('admin.maintainers.destroy', $maintainer->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $maintainer->id }}')">
                            {{ trans('global.delete') }}
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Pagination links -->
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($maintainers->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $maintainers->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $maintainers->lastPage(); $page++)
                <li class="page-item {{ $maintainers->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $maintainers->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($maintainers->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $maintainers->nextPageUrl() }}" rel="next">&raquo;</a>
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
    function confirmDelete(maintainerId) {
        if (confirm("Are you sure you want to delete this maintainer?")) {
            document.getElementById('delete-maintainer-' + maintainerId).submit();
        }
    }
</script>
@endsection
