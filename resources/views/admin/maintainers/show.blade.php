@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.maintainer.title') }}
    </div>

    <div class="card-body">
        <!-- Back Button -->
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.maintainers.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <!-- Profile Details Section -->
        <div class="text-center mb-4">
            @if($maintainer->image)
                <div style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%; margin: 0 auto;">
                    <a href="{{ $maintainer->image->getUrl() }}" target="_blank" style="display: inline-block; width: 100%; height: 100%;">
                        <img src="{{ $maintainer->image->getUrl('') }}" style="object-fit: cover; width: 100%; height: 100%;" alt="Maintainer Image">
                    </a>
                </div>
            @endif
            <h2>{{ $maintainer->name }}</h2>
            <p class="text-muted">{{ $maintainer->phone_number }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.id') }}</th>
                        <td>{{ $maintainer->id }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.name') }}</th>
                        <td>{{ $maintainer->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.phone_number') }}</th>
                        <td>{{ $maintainer->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.units_assigned') }}</th>
                        <td>
                            @foreach($maintainer->units_assigneds as $key => $units_assigned)
                                <span class="badge bg-info">{{ $units_assigned->unit_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.section_assigned') }}</th>
                        <td>{{ $maintainer->section_assigned->section_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.maintainer.fields.property_assigned') }}</th>
                        <td>
                            @foreach($maintainer->property_assigneds as $key => $property_assigned)
                                <span class="badge bg-info">{{ $property_assigned->property_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.maintainers.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>

@endsection
