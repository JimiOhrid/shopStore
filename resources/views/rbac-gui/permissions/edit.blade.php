@extends('rbac-gui.app')

@section('heading', 'Edit Permission')

@section('content')
<form action="{{ route('rbac.permissions.update', $permission->id) }}" method="post" role="form">
<input type="hidden" name="_method" value="put">
  @include('rbac-gui.permissions.partials.form')
  <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>Save</button>
  <a class="btn btn-labeled btn-default" href="{{ route('rbac.permissions.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>Cancel</a>
</form>
@endsection

