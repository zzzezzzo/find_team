@extends("layout.master")


@section('page-title')
    Product Details
@endsection


@section('page-content')
    <h1 class="display-1 my-5 text-primary">Product Details:</h1>
    <div class="row">
        <div class="col-8">
            <h2>ID: {{ $product->id }}</h2>
            <h2>Name: {{ $product->name }}</h2>
            <h2>Description: {{ $product->description }}</h2>
            <h2>Price: {{ $product->price }}</h2>
            <h2>Stock: {{ $product->stock }}</h2>
            <h2>Category_id: {{ $product->category->name }}</h2>
        </div>
        <div class="col-4">
                <img src="{{ asset('public/products/' . $product->image) }}" class="product-show">
        </div>
    </div>
@endsection
