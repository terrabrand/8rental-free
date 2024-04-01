@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.name') }}
                        </th>
                        <td>
                            {{ $invoice->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.tenant') }}
                        </th>
                        <td>
                            @foreach($invoice->tenants as $key => $tenant)
                                <span class="label label-info">{{ $tenant->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.landlord') }}
                        </th>
                        <td>
                            @foreach($invoice->landlords as $key => $landlord)
                                <span class="label label-info">{{ $landlord->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_type') }}
                        </th>
                        <td>
                            @foreach($invoice->invoice_types as $key => $invoice_type)
                                <span class="label label-info">{{ $invoice_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.property') }}
                        </th>
                        <td>
                            @foreach($invoice->properties as $key => $property)
                                <span class="label label-info">{{ $property->property_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.section') }}
                        </th>
                        <td>
                            @foreach($invoice->sections as $key => $section)
                                <span class="label label-info">{{ $section->section_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.unit') }}
                        </th>
                        <td>
                            @foreach($invoice->units as $key => $unit)
                                <span class="label label-info">{{ $unit->unit_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date') }}
                        </th>
                        <td>
                            {{ $invoice->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date_due') }}
                        </th>
                        <td>
                            {{ $invoice->date_due }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.partial_amount') }}
                        </th>
                        <td>
                            {{ $invoice->partial_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.amount') }}
                        </th>
                        <td>
                            {{ $invoice->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.tax') }}
                        </th>
                        <td>
                            {{ $invoice->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Invoice::STATUS_SELECT[$invoice->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date_paid') }}
                        </th>
                        <td>
                            {{ $invoice->date_paid }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection