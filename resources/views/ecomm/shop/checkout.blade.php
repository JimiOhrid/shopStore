@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')

    <div class="col-sm-12">
        <div class="row">
            <div style="text-align: center;">
                <h1>Your order</h1>
            </div>
        </div>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Qtty / Item Description</th>
                <th class="text-right">Total value</th>
                <th class="text-center">Action</th>
            </tr>
            <tr>
                <td>
                    @foreach($cart->all() as $key => $item)
                        {{ $item['qtty'] }}
                        <span class="fa fa-cart-plus"></span>&nbsp;
                        <a href="{{ route('store.product', ['id' => $key]) }}">{{ $item['name'] }}</a>
                        <br>
                    @endforeach
                </td>
                <td class="text-right" style="vertical-align: middle;">TOTAL: ${{ number_format($cart->getTotal(), 2, ',', '.') }}</td>
                <td class="text-center">
                    <form action="/payment" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="amount" value="{{$cart->getTotal()*100}}">
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_faCj8JNyqTnGoBYEwyjJIjrS"
                                data-amount="{{$cart->getTotal()*100}}"
                                data-name="Checkout"
                                data-description="your order!"
                                data-email="{{Auth::user()->email}}"
                                data-image="{{ url('images/logo.jpg') }}"
                                data-locale="auto">
                        </script>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

