@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="row">
            <div style="text-align: center;">
                <h1>Your shopping cart</h1>
            </div>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-bordered" style="align-items: center">
                <thead>
                <tr class="cart_menu">
                    <td class="col-sm-2 text-center" style="font-size: large">Name</td>
                    <td class="col-sm-2 text-center" style="font-size: large">Value</td>
                    <td class="col-sm-2 text-center" style="font-size: large">Quantity</td>
                    <td class="col-sm-2 text-center" style="font-size: large">Total</td>
                    <td class="col-sm-2 text-center" style="font-size: large">Action</td>
                </tr>
                </thead>
                <tbody>
                @forelse($cart->all() as $key => $item)
                    <tr>
                        <td>
                            <h4><a href="{{ route('store.product', ['id' => $key]) }}">{{ $item['name'] }}</a></h4>
                        </td>
                        <td>
                            ${{ number_format($item['price'], 2, ',', '.') }}
                        </td>
                        <td>
                            <div class="input-group">
                                <input data-id="{{ $key }}" name="qtty-{{ $key }}" type="text"
                                       class="pull-right spin" value="{{ $item['qtty'] }}">
                            </div>
                        </td>
                        <td>
                            ${{ number_format($item['price'] * $item['qtty'], 2, ',', '.') }}
                        </td>
                        <td class="text-right">
                            <a href="{{ route('cart.destroy', ['id' => $key]) }}" class="btn btn-sm btn-danger">
                                <span class="fa fa-remove"></span>Remove
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <h4><p>No item has been added to the CART!</p></h4>
                        </td>
                    </tr>
                @endforelse
                <tr class="cart_menu">
                    <td colspan="7">
                        <div class="pull-right">
                            <span style="margin-right: 60px;">TOTAL: $ {{ number_format($cart->getTotal(), 2, ',', '.') }}</span>
                            <a href="{{route('checkout.pay') }}" class="btn btn-primary">Complete the purchase</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.spin').TouchSpin({
            min: 1,
            max: 1000,
            postfix: '<span class="fa fa-refresh"></span>',
            postfix_extraclass: "btn btn-default"
        });
        $(".bootstrap-touchspin-postfix").on('click', function () {
            var id = $(this).closest('.input-group').find('input[type="text"]').attr('data-id');
            var qtty = $(this).closest('.input-group').find('input[type="text"]').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('store.cart.change') }}",
                data: {_token: "{{ csrf_token() }}", id: id, qtty: qtty},
                success: function (data) {
                    if (data.status == 'success') {
                        document.location.reload();
                    } else {
                        console.log(data);
                    }
                }
            });
        }).attr('title', 'Update CART');
    </script>
@stop