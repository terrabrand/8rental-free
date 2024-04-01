@extends('layouts.admin')
@section('content')
@can('property_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.properties.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.property.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Property', 'route' => 'admin.properties.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.property.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="row">
            @foreach($properties as $property)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-blog card-plain" >
                    <div class="position-relative">
                        <a href="{{ route('admin.properties.show', $property->id) }}" class="d-block shadow-xl border-radius-xl" style="height: 180px;">
                            @if($property->main_image)
                                <img src="{{ $property->main_image->getUrl() }}" alt="Property Image" class="img-fluid shadow border-radius-xl" style="object-fit: cover; width: 100%; height: 100%;">
                            @endif
                        </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm">{{ $property->property_type }}</p>
                        <a href="{{ route('admin.properties.show', $property->id) }}">
                            <h5>{{ $property->property_name }}</h5>
                        </a>
                        <p class="mb-4 text-sm">{{ $property->location }}</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-outline-primary btn-sm mb-0">{{ trans('global.view') }}</a>
                            </div>
                            <div class="d-flex">
                                <!-- Edit Button -->
                                @can('property_edit')
                                <button type="button" class="btn btn-link text-info mr-2" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.properties.edit', $property->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan
                                
                                <!-- Delete Button -->
                                @can('property_delete')
                                <form id="delete-property-{{ $property->id }}" action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $property->id }}')">
                                        <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Pagination links -->
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($properties->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $properties->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $properties->lastPage(); $page++)
                <li class="page-item {{ $properties->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $properties->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($properties->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $properties->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>



<script>
    function confirmDelete(propertyId) {
        if (confirm("Are you sure you want to delete this property?")) {
            document.getElementById('delete-property-' + propertyId).submit();
        }
    }
</script>

@endsection
