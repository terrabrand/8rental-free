@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.income.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.incomes.update", [$income->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.income.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $income->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.income.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="income_type_id">{{ trans('cruds.income.fields.income_type') }}</label>
                <select class="form-control select2 {{ $errors->has('income_type') ? 'is-invalid' : '' }}" name="income_type_id" id="income_type_id" required>
                    @foreach($income_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('income_type_id') ? old('income_type_id') : $income->income_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('income_type'))
                    <span class="text-danger">{{ $errors->first('income_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.income.fields.income_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.income.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $income->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.income.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_income">{{ trans('cruds.income.fields.date_of_income') }}</label>
                <input class="form-control date {{ $errors->has('date_of_income') ? 'is-invalid' : '' }}" type="text" name="date_of_income" id="date_of_income" value="{{ old('date_of_income', $income->date_of_income) }}" required>
                @if($errors->has('date_of_income'))
                    <span class="text-danger">{{ $errors->first('date_of_income') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.income.fields.date_of_income_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection