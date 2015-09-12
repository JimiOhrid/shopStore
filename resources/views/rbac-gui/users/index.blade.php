@extends('rbac-gui.app')

@section('heading', 'Users')

@section('content')
<table class="table table-striped">
  <tr>
    <th>Email</th>
    <th>Actions</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <th>{{ $user->email }}</th>
      <td class="col-xs-3">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <a class="btn btn-labeled btn-default" href="{{ route('rbac.users.edit', $user->id) }}">
            <span class="btn-label"><i class="fa fa-pencil"></i></span>Edit User Roles</a>
      </td>
    </tr>
  @endforeach
</table>
<div class="text-center">
  {!! $users->render() !!}
</div>
@endsection
