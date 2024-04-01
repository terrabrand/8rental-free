<div class="m-3">
@can('unit_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.units.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.unit.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'unit', 'route' => 'admin.units.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.unit.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="row">
            @foreach($units as $key => $unit)
            <div class="col-lg-2 col-md-2 col-sm-2 col-5 mb-4">
                <div class="card card-blog card-plain" >
                    <div class="position-relative">
                        <a href="{{ route('admin.units.show', $unit->id) }}" class="d-block shadow-xl border-radius-xl" style="height: 180px;">
                            @if($unit->cover_image)
                                <img src="{{ $unit->cover_image->getUrl() }}" alt="unitImage" class="img-fluid shadow border-radius-xl" style="object-fit: cover; width: 100%; height: 100%;">
                            @endif
                        </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm">Rent - {{ $unit->rent_price }}    Bedrooms - {{ $unit->number_of_bedrooms ?? '' }}</p>
                        <a href="{{ route('admin.units.show', $unit->id) }}">
                            <h5>{{ $unit->unit_name }}</h5>
                        </a>
                        <p class="mb-2 text-sm">Unit Size - {{ $unit->unit_size }}Sqm    Bathrooms - {{ $unit->number_of_bathrooms ?? '' }}</p>
                        <p class="mb-2 text-sm">Property - {{ $unit->property->property_name ?? '' }}</p>
                        
                            
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- View Button -->
                                @can('unit_edit')
                                <button type="button" class="btn btn-link text-info mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.units.show', $unit->id) }}'">
                                    <i class="fas fa-eye"></i> <!-- View Icon -->
                                </button>
                                @endcan
                                <!-- Edit Button -->
                                @can('unit_edit')
                                <button type="button" class="btn btn-link text-info mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.edit') }}" onclick="location.href='{{ route('admin.units.edit', $unit->id) }}'">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </button>
                                @endcan
                                
                                <!-- Delete Button -->
                                @can('unit_delete')
                                <form id="delete-unit-{{ $unit->id }}" action="{{ route('admin.units.destroy', $unit->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger mr-1" style="padding: 0.4rem 0.7rem;" data-toggle="tooltip" data-placement="top" title="{{ trans('global.delete') }}" onclick="confirmDelete('{{ $unit->id }}')">
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





<script>
    function confirmDelete(unitId) {
        if (confirm("Are you sure you want to delete this unit?")) {
            document.getElementById('delete-unit-' + unitId).submit();
        }
    }
</script>