@extends('layouts.admin')
@section('content')
<div class="m-3">
@can('landlord_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.landlords.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.landlord.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Landlord', 'route' => 'admin.landlords.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
        <div class="card-header">
            {{ trans('cruds.landlord.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
<div class="row">
    @foreach($landlords as $key => $landlord)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="{{ $landlord->image->getUrl('') }}" alt="{{ $landlord->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $landlord->name ?? '' }}</h5>
                <p>{{ trans('cruds.landlord.fields.company_name') }}: {{ $landlord->company_name ?? '' }}</p>
                <p>{{ trans('cruds.landlord.fields.phone_number') }}: {{ $landlord->phone_number ?? '' }}</p>
            </div>
            <div class="card-footer">
                @can('landlord_show')
                    <a class="btn btn-primary" href="{{ route('admin.landlords.show', $landlord->id) }}">
                        {{ trans('global.view') }}
                    </a>
                @endcan

                @can('landlord_edit')
                    <a class="btn btn-info" href="{{ route('admin.landlords.edit', $landlord->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('landlord_delete')
                    <form action="{{ route('admin.landlords.destroy', $landlord->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan
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
            @if ($landlords->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $landlords->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($page = 1; $page <= $landlords->lastPage(); $page++)
                <li class="page-item {{ $landlords->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $landlords->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            @if ($landlords->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $landlords->nextPageUrl() }}" rel="next">&raquo;</a>
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

