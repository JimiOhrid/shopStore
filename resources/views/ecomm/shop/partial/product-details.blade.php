@extends('ecomm.shop.store')
@section('categories')
    @include('ecomm.shop.partial.categories')
@stop
@section('content')
    <div class="col-sm-2" xmlns="http://www.w3.org/1999/html"></div>
    <div class="col-sm-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Product details</div>
            <div class="panel-body">
                <div class="col-sm-5">
                    <div class="img-thumbnail">
                        @if(count($product->images))
                            <img src="{{ url('/uploads/'.$product->images->first()->id . '.' . $product->images->first()->extension) }}"
                                 alt="{{ $product->name }}" width="300" height="300"/>
                        @else
                            <img src="{{ url('images/no-img.png') }}" alt="{{ $product->name }}" width="200"/>
                        @endif
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <h2>Name: {{ $product->name }}</h2>
                        <p>Description: {{ $product->description }}</p>

                        <p>Price: ${{ number_format($product->price, 2, ',', '.') }}</p>
                        <p>
                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop