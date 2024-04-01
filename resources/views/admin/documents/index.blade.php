@extends('layouts.admin')
@section('content')
@can('document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.document.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'document', 'route' => 'admin.documents.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.document.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="row">
            @foreach($documents as $document)
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card card-blog card-plain">
    <div class="position-relative d-flex justify-content-center align-items-center" style="height: 180px;">
        <a href="{{ route('admin.documents.show', $document->id) }}" class="d-block shadow-xl border-radius-xl">
            <i class="far fa-file-pdf" style="font-size: 148px; color: #FF5733;"></i>
        </a>
    </div>
    <div class="card-body px-1 pb-0">
        <p class="text-gradient text-dark mb-2 text-sm">{{ $document->brand_name }} - Price {{ $document->price }}</p>
        <a href="{{ route('admin.documents.show', $document->id) }}">
            <h5>{{ $document->name }}</h5>
        </a>
        @foreach($document->document_types as $key => $document_type)
        <p class="mb-1 text-sm">{{ $document_type->name }}</p>
        @endforeach
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('admin.documents.show', $document->id) }}" class="btn btn-outline-primary btn-sm mb-0">{{ trans('global.view') }}</a>
            </div>
            <div class="d-flex">
                <!-- Edit Button -->
                @can('document_edit')
                <button type="button" class="btn btn-link text-info mr-2" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.documents.edit', $document->id) }}'">
                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                </button>
                @endcan
                
                <!-- Delete Button -->
                @can('document_delete')
                <form id="delete-document-{{ $document->id }}" action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $document->id }}')">
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
            @if ($documents->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $documents->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $documents->lastPage(); $page++)
                <li class="page-item {{ $documents->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $documents->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($documents->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $documents->nextPageUrl() }}" rel="next">&raquo;</a>
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
    function confirmDelete(documentId) {
        if (confirm("Are you sure you want to delete this document?")) {
            document.getElementById('delete-document-' + documentId).submit();
        }
    }
</script>

@endsection
