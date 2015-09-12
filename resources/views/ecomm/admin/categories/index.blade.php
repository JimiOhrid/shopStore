@extends('ecomm.admin.main')

@section('title', 'Categories')

@section('content')
    <div class="content">
        <div class="row">
            <div style="text-align: center;">
                <h1>Categories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success pull-right" href="{{ route('categories.create') }}"><span
                            class="fa fa-plus"></span></a>
                <br><br>
            </div>
        </div>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <td class="col-sm-1 text-center">ID</td>
                <td class="col-sm-4">Name</td>
                <td class="col-sm-6">Description</td>
                <td class="col-sm-1 text-center">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $category)
                <tr>
                    <td class="vert-align text-center">{{ $category->id }}</td>
                    <td class="vert-align">{{ $category->name }}</td>
                    <td class="vert-align">{{ $category->description }}</td>
                    <td class="vert-align text-center">
                        <a class="btn btn-sm btn-info" href="{{ route('categories.edit', ['id' => $category->id]) }}"
                           title="Edit"><span class="fa fa-pencil"></span></a>
                        <a class="btn btn-sm btn-danger"
                           href="{{ route('categories.destroy', ['id' => $category->id]) }}" title="Delete"><span
                                    class="fa fa-remove"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="hide-if-no-paging">
            <tr>
                <td colspan="4" class="text-center">
                    <ul class="pagination pagination-centered">
                        {!! $categories->render() !!}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection