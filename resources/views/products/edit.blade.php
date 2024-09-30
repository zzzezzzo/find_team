@extends('layout.master')

@section('page-title')
    Edit Product Details
@endsection

@section('page-content')
    <h1 class="display-1 my-5 text-primary">Edit Product Details</h1>
    <form class="row" action="/products/{{ $product->id }}" method="post">
        @csrf {{-- Cross-Site Request Forgery --}}
        @method("put")  {{-- HTTP Method Override --}}
        <div class="col-12">
            <label for="name">Product Name:</label>
            <input type="text" value="{{ $product->name }}" name="name" id="name" class="form-control mt-2 mb-3">
        </div>
        <div class="col-12">
            <label for="description">Product Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mt-2 mb-3">{{ $product->description }}</textarea>
        </div>
        <div class="col-4">
            <label for="price">Product Price</label>
            <input type="text" value="{{ $product->price }}" name="price" id="price" class="form-control mt-2 mb-3">
        </div>
        <div class="col-4">
            <label for="stock">Product Stock</label>
            <input type="text" value="{{ $product->stock }}" name="stock" id="stock" class="form-control mt-2 mb-3">
        </div>
        <div class="col-4">
            <select>
                @foreach($categories as $category)
                    {{ $category->name }}
                @endforeach
            </select>
            <label for="category_id">Product Category</label>
            <input type="text" value="{{ $categories->name }}" name="category_id" id="category_id" class="form-control mt-2 mb-3">
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center mb-5 mt-3">
            <button type="submit" class="btn btn-outline-primary col-3 me-2">Update Product</button>
            <a href="/products" class="btn btn-outline-secondary col-3 ms-2">Back to List</a>
        </div>
    </form>
@endsection
