@extends('layout.master')

@section('page-title')
    New Product
@endsection

@section('page-content')
    <h1 class="display-1 my-5 text-primary">New Product</h1>
    <form class="row" action="/products" method="post" enctype="multipart/form-data">
        @csrf {{-- Cross-Site Request Forgery --}}
        <div class="col-12">
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" class="form-control mt-2 mb-3">
        </div>
        <div class="col-12">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" class="form-control mt-2 mb-3">
        </div>
        <div class="col-12">
            <label for="description">Product Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mt-2 mb-3"></textarea>
        </div>
        <div class="col-4">
            <label for="price">Product Price</label>
            <input type="text" name="price" id="price" class="form-control mt-2 mb-3">
        </div>
        <div class="col-4">
            <label for="stock">Product Stock</label>
            <input type="text" name="stock" id="stock" class="form-control mt-2 mb-3">
        </div>
        <div class="col-4">
            <label for="category_id">Product Category</label>
            <select name="category_id" id="category_id" class="form-select mt-2 mb-3">
                <option value="">Select a Product Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center mb-5 mt-3">
            <button type="submit" class="btn btn-outline-success col-3 me-2">Add Product</button>
            <a href="/products" class="btn btn-outline-secondary col-3 ms-2">Back to List</a>
        </div>
    </form>
@endsection
