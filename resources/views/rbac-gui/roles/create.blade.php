@extends('rbac-gui.app')

@section('heading', 'Create Role')

@section('content')
<form action="{{ route('rbac.roles.store') }}" method="post" role="form">
    @include('rbac-gui.roles.partials.form')
    <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>Create</button>
    <a class="btn btn-labeled btn-default" href="{{ route('rbac.roles.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>Cancel</a>
</form>
@endsection
