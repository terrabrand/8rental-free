@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expense.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.id') }}
                        </th>
                        <td>
                            {{ $expense->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.name') }}
                        </th>
                        <td>
                            {{ $expense->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.landlord') }}
                        </th>
                        <td>
                            @foreach($expense->landlords as $key => $landlord)
                                <span class="label label-info">{{ $landlord->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.property') }}
                        </th>
                        <td>
                            @foreach($expense->properties as $key => $property)
                                <span class="label label-info">{{ $property->property_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.unit') }}
                        </th>
                        <td>
                            @foreach($expense->units as $key => $unit)
                                <span class="label label-info">{{ $unit->unit_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.tenant') }}
                        </th>
                        <td>
                            @foreach($expense->tenants as $key => $tenant)
                                <span class="label label-info">{{ $tenant->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.responsible') }}
                        </th>
                        <td>
                            {{ App\Models\Expense::RESPONSIBLE_SELECT[$expense->responsible] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.expense_type') }}
                        </th>
                        <td>
                            @foreach($expense->expense_types as $key => $expense_type)
                                <span class="label label-info">{{ $expense_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.description') }}
                        </th>
                        <td>
                            {{ $expense->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.amount') }}
                        </th>
                        <td>
                            {{ $expense->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Expense::STATUS_SELECT[$expense->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expense.fields.date_of_expense') }}
                        </th>
                        <td>
                            {{ $expense->date_of_expense }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection