<div class="col-sm-2"></div>
<div class="col-sm-10">
    @if(count($products) == 0)
        <div class="text-center">
        <h2>Currently there are no products in this category</h2>
            </div>
    @endif
    @for ($i = 0; $i < count($products); $i++)
        @if($i % 4 == 0)
            <div class="row"></div>
            @endif
            <div class="col-sm-3">
                <div class="img-thumbnail" style=" text-align: center; width:250px; height:300px">
                    @if(count($products[$i]->images))
                        <img src="{{ url('/uploads/'.$products[$i]->images->first()->id . '.' . $products[$i]->images->first()->extension) }}"
                             alt="{{ $products[$i]->name }}" width="150" height="150"/>
                    @else
                        <img src="{{ url('images/no-img.png') }}" alt="{{ $products[$i]->name }}"width="150" height="150" />
                    @endif
                    <h5>{{ $products[$i]->name }}</h5>
                    <h3>US ${{ number_format($products[$i]->price, 2, ',', '.') }}</h3>
                    <div class="caption">
                        <a href="{{ route('store.product', ['id' => $products[$i]->id]) }}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-crosshairs"></i>More details</a>
                        <a href="{{ route('cart.add', ['id' => $products[$i]->id]) }}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="text-center">
            {!! $products->render() !!}
        </div>
    </div>
</div>
