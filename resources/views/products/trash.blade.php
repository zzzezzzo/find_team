@extends("layout.master")

@section('page-title')
    Products Trash
@endsection


@section('page-content')
    <h1 class="display-1 text-danger my-5">Products Trash</h1>
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td><img src="{{ asset('storage/products/' . $product->image) }}" class="product-preview"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/restore" class="btn btn-outline-success">Restore</a>
                    <form style="display: inline-block;" action="/products/{{ $product->id }}/delete_forever" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete Permanently</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
