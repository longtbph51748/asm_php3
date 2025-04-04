@extends('backend.layouts')
@section('title', 'Sửa sản phẩm')
@section('content')
    <h2>Cập nhật sản phẩm</h2>
    <form action="{{ route('products.update', $product->id) }}') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror+
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category Name</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" @selected($product->category_id == $cate->id)>{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>    
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Câp nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">Quay lại</a>
        </div>
    </form>
@endsection