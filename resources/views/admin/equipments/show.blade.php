@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.id') }}
                        </th>
                        <td>
                            {{ $equipment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.name') }}
                        </th>
                        <td>
                            {{ $equipment->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.equipment_type') }}
                        </th>
                        <td>
                            {{ $equipment->equipment_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.image') }}
                        </th>
                        <td>
                            @if($equipment->image)
                                <a href="{{ $equipment->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $equipment->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.brand_name') }}
                        </th>
                        <td>
                            {{ $equipment->brand_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.model_number') }}
                        </th>
                        <td>
                            {{ $equipment->model_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.price') }}
                        </th>
                        <td>
                            {{ $equipment->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.serial_number') }}
                        </th>
                        <td>
                            {{ $equipment->serial_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.warranty_expiration') }}
                        </th>
                        <td>
                            {{ $equipment->warranty_expiration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipment.fields.equipment_details') }}
                        </th>
                        <td>
                            {{ $equipment->equipment_details }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection