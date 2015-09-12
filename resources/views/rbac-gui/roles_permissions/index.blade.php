@extends('rbac-gui.app')

@section('heading', 'Permissions/Roles')

@section('content')
    <div class="container-fluid">
        {!! Form::open(['url' => 'rbac/role_permission']) !!}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Permissions</th>
                <th>Routes</th>
                @foreach($roles as $role)
                    <th class="text-center">{{ $role->display_name }}</th>
                @endforeach
            </tr>
            <tr>
                <th colspan="{{ count($roles) }}">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td width="150">{{ $permission->display_name }}</td>
                    <td style="background-color: #00b3ee">
                        {{ implode(', ',array_values(array_column($routes->where('permission_id',$permission->id)->toArray(),'route')))
                        }}</td>
                    @foreach ($roles as $role)
                        <td width="150" class="text-center">
                            @if ($permission->hasRole($role->name) && $role->name == 'admin')
                                <input type="checkbox" checked="checked" name="roles[{{ $role->id}}][permissions][]" value="{{ $permission->id }}" disabled="disabled">
                                <input type="hidden" name="roles[{{ $role->id}}][permissions][]" value="{{ $permission->id }}">
                            @elseif($permission->hasRole($role->name))
                                <input type="checkbox" checked="checked" name="roles[{{ $role->id}}][permissions][]" value="{{ $permission->id }}">
                            @else
                                <input type="checkbox" name="roles[{{ $role->id }}][permissions][]" value="{{ $permission->id }}">
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop