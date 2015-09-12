@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')
    @include('ecomm.shop.partial.products', ['products'=> $recommends])
@stop