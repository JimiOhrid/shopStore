@extends('rbac-gui.app')

@section('heading', 'Permissions')

@section('content')
<a class="btn btn-labeled btn-primary" href="{{ route('rbac.permissions.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>Create Permission</a>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach($permissions as $permission)
        <tr>
            <th>{{ $permission->name }}</th>
            <td class="col-xs-3">
                <form action="{{ route('rbac.permissions.destroy', $permission->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-labeled btn-default" href="{{ route('rbac.permissions.edit', $permission->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>
                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $permissions->render() !!}
</div>
@endsection
