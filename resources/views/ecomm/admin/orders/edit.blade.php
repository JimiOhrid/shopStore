@extends('ecomm.admin.main')

@section('title', 'Orders')

@section('content')
    <div class="content">
        {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <legend>Edit Order # {{ $order->id }}</legend>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status, $order->status, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-7 col-lg-2 col-lg-offset-7">
                {!! Form::submit('Save Order', ['class' => 'btn btn-success form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection