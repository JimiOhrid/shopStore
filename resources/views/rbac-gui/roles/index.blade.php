@extends('rbac-gui.app')

@section('heading', 'Roles')

@section('content')
<a class="btn btn-labeled btn-primary" href="{{ route('rbac.roles.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>Create</a>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach($roles as $role)
        <tr>
            <th>{{ $role->name }}</th>
            <td class="col-sm-3">
                <form action="{{ route('rbac.roles.destroy', $role->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-labeled btn-default" href="{{ route('rbac.roles.edit', $role->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>Edit</a>
                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $roles->render() !!}
</div>
@endsection
