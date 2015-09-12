@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')
    <div class="col-sm-12">
        <div class="row">
            <div style="text-align: center;">
                <h1>Your orders</h1>
            </div>
        </div>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th class="text-center"># of Order</th>
                <th>Qtty / Item Description</th>
                <th class="text-right">Total value</th>
                <th class="text-center">Status</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td class="text-center" style="vertical-align: middle;">{{ $order->id }}</td>
                    <td>
                        @foreach($order->items as $item)
                            {{ $item->qty }}
                            <span class="fa fa-cart-plus"></span>&nbsp;
                            <a href="{{ route('store.product', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a>
                            <br>
                        @endforeach
                    </td>
                    <td class="text-right" style="vertical-align: middle;">
                        $ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td class="text-center">{{ $order->status() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
