@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.section.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.id') }}
                        </th>
                        <td>
                            {{ $section->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.section_name') }}
                        </th>
                        <td>
                            {{ $section->section_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.property') }}
                        </th>
                        <td>
                            {{ $section->property->property_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.description') }}
                        </th>
                        <td>
                            {{ $section->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#unit_section_units" role="tab" data-toggle="tab">
                {{ trans('cruds.unit.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#section_assigned_maintainers" role="tab" data-toggle="tab">
                {{ trans('cruds.maintainer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#section_tenants" role="tab" data-toggle="tab">
                {{ trans('cruds.tenant.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#section_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="unit_section_units">
            @includeIf('admin.sections.relationships.unitSectionUnits', ['units' => $section->unitSectionUnits])
        </div>
        <div class="tab-pane" role="tabpanel" id="section_assigned_maintainers">
            @includeIf('admin.sections.relationships.sectionAssignedMaintainers', ['maintainers' => $section->sectionAssignedMaintainers])
        </div>
        <div class="tab-pane" role="tabpanel" id="section_tenants">
            @includeIf('admin.sections.relationships.sectionTenants', ['tenants' => $section->sectionTenants])
        </div>
        <div class="tab-pane" role="tabpanel" id="section_invoices">
            @includeIf('admin.sections.relationships.sectionInvoices', ['invoices' => $section->sectionInvoices])
        </div>
    </div>
</div>

@endsection