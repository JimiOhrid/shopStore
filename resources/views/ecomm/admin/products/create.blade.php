@extends('ecomm.admin.main')

@section('title', 'Products')

@section('content')
    <div class="content">
        {!! Form::open(['route' => 'products.store']) !!}
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <legend>New Product</legend>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Product description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('recommended', 'Recommended:&nbsp;') !!}
                    {!! Form::radio('recommended', 1, false, ['class' => 'field']) !!} Yes
                    {!! Form::radio('recommended', 0, false, ['class' => 'field']) !!} No
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-7 col-lg-2 col-lg-offset-7">
                {!! Form::submit('Add Product', ['class' => 'btn btn-success form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection