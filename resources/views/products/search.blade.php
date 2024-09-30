@extends("layout.master")


@section('page-title')
    Search Products
@endsection


@section('page-content')
    <h1 class="display-1 text-primary my-5">Search Products</h1>
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
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/products/{{ $product->id }}" class="btn btn-outline-warning">View</a>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-outline-info">Edit</a>
                    <form style="display: inline-block;" action="/products/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
