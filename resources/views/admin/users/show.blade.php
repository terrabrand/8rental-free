@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <td>
                            {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.company_name') }}
                        </th>
                        <td>
                            {{ $user->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.state') }}
                        </th>
                        <td>
                            {{ $user->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.image') }}
                        </th>
                        <td>
                            @if($user->image)
                                <a href="{{ $user->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection