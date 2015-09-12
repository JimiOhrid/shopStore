@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')
    <div class="row-fluid">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div style="text-align: center;">
                <h1>Products from {{ $categoryName }} category</h1>
            </div>
        </div>
    </div>
    @include('ecomm.shop.partial.products', ['products' => $products])
@stop