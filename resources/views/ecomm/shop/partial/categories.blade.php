@section('categories')
    <div class="col-sm-2">
        <div class="row">
            <div style="text-align: center;">
                <h2>Categories</h2>
            </div>
        </div>
        <div class="list-group">
            @foreach($categories as $category)
                <a href="{{ route('store.category', $category->id) }}" class="list-group-item">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
@stop
