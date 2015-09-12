@extends('ecomm.admin.main')

@section('title', 'Products')

@section('content')
    <div class="content">
        <div class="row">
            <div style="text-align: center;">
                <h1>Products</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success pull-right" href="{{ route('products.create') }}"><span
                            class="fa fa-plus"></span></a>
                <br><br>
            </div>
        </div>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <td class="col-sm-1 text-center">ID</td>
                <td class="col-sm-2">Name</td>
                <td class="col-sm-4">Description</td>
                <td class="col-sm-1 text-center">Price</td>
                <td class="col-sm-2 text-center">Category</td>
                <td class="col-sm-2 text-center">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td class="vert-align text-center">{{ $product->id }}</td>
                    <td class="vert-align">{{ $product->name }}</td>
                    <td class="vert-align text-justify">{{ $product->description }}</td>
                    <td class="vert-align text-center">{{ $product->price }}</td>
                    <td class="vert-align text-center">{{ $product->category->name }}</td>
                    <td class="vert-align text-center">
                        <a class="btn btn-sm btn-default" href="{{ route('products.images', ['id' => $product->id]) }}"><span
                                    class="fa fa-image"></span></a>
                        <a class="btn btn-sm btn-info" href="{{ route('products.edit', ['id' => $product->id]) }}"><span
                                    class="fa fa-pencil"></span></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('products.destroy', ['id' => $product->id]) }}"><span
                                    class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="hide-if-no-paging">
            <tr>
                <td colspan="6" class="text-center">
                    <ul class="pagination pagination-centered">
                        {!! $products->render() !!}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection