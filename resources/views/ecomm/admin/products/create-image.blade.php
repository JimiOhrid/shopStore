@extends('ecomm.admin.main')

@section('title', 'Products')

@section('content')
    <div class="content">
        {!! Form::open(['route' => ['products.images.store', $product->id], 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <legend>Upload Image</legend>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    <span class="btn btn-default btn-file">
                        Search file
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </span>
                    <span class="file-name"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-3 col-lg-3 col-lg-offset-3">
                {!! Form::submit('Upload Image', ['class' => 'btn btn-success form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection