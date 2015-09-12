@extends('ecomm.admin.main')

@section('title', 'Products')

@section('content')
    <div class="content">
        <h1>Images</h1>

        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success pull-right"
                   href="{{ route('products.images.create', ['id' => $product->id]) }}"><span
                            class="fa fa-plus"></span></a>
                <br><br>
            </div>
        </div>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <td class="col-sm-1 text-center">ID</td>
                <td class="col-sm-6">Image</td>
                <td class="col-sm-2">Extension</td>
                <td class="col-sm-3 text-center">Actions</td>
            </tr>
            </thead>
            <tbody>
            @if (count($product->images) > 0)
                @foreach($product->images as $key => $image)
                    <tr>
                        <td class="vert-align text-center">{{ $image->id }}</td>
                        <td class="vert-align text-center">
                            <img src="{{ url('/uploads/' . $image->id . '.' . $image->extension) }}" width="100">
                        </td>
                        <td class="vert-align text-center">{{ $image->extension }}</td>
                        <td class="vert-align text-center">
                            <a class="btn btn-sm btn-danger"
                               href="{{ route('products.images.destroy', ['id' => $image->id]) }}"><span
                                        class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center"><span class="glyphicon glyphicon-picture"></span> image not
                        found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <a href="{{ route('products') }}" class="btn btn-default">Go back</a>
    </div>
@endsection