@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.document.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.id') }}
                        </th>
                        <td>
                            {{ $document->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.name') }}
                        </th>
                        <td>
                            {{ $document->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.document_type') }}
                        </th>
                        <td>
                            @foreach($document->document_types as $key => $document_type)
                                <span class="label label-info">{{ $document_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.tenant') }}
                        </th>
                        <td>
                            @foreach($document->tenants as $key => $tenant)
                                <span class="label label-info">{{ $tenant->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.landlord') }}
                        </th>
                        <td>
                            @foreach($document->landlords as $key => $landlord)
                                <span class="label label-info">{{ $landlord->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.property') }}
                        </th>
                        <td>
                            @foreach($document->properties as $key => $property)
                                <span class="label label-info">{{ $property->property_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.unit') }}
                        </th>
                        <td>
                            @foreach($document->units as $key => $unit)
                                <span class="label label-info">{{ $unit->unit_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection