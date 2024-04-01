@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.income.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.incomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.income.fields.id') }}
                        </th>
                        <td>
                            {{ $income->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.income.fields.name') }}
                        </th>
                        <td>
                            {{ $income->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.income.fields.income_type') }}
                        </th>
                        <td>
                            {{ $income->income_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.income.fields.amount') }}
                        </th>
                        <td>
                            {{ $income->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.income.fields.date_of_income') }}
                        </th>
                        <td>
                            {{ $income->date_of_income }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.incomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection