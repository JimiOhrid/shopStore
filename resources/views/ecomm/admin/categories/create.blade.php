@extends('ecomm.admin.main')

@section('title', 'Categories')

@section('content')
    <div class="content">
        {!! Form::open(['route' => 'categories.store']) !!}
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <legend>New Category</legend>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the category']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter the description of the category']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-6">
                <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>Create</button>
                <a class="btn btn-labeled btn-default" href="{{ route('categories') }}">
                    <span class="btn-label"><i class="fa fa-chevron-left"></i></span>Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection