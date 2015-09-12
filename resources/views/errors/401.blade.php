@extends('errors.error')

@section('head.title')
	Not found
@stop

@section('message')
	<div class="content">
		<div class="title">401</div>
		<div class="description">
            Oops! You are unauthorized to access the resource. <a href="{{ URL::previous() }}">Click here</a> to go back.
        </div>
	</div>
@stop