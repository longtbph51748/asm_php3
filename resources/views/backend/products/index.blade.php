@extends('backend.layouts')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <h2>Danh sách sản phẩm</h2>
    @session('message')
    <div class="alert text-success">
        {{session('message')}}
    </div>
    @endsession
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Thêm sản phẩm</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}đ</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" width="100"></td>
                {{-- <p>{{ asset('storage/' . $product->image) }}</p> --}}
                <td>{{ $product->stock }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <div class="btn-group d-flex align-items-center flex-nowrap" role="group">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                        </form>
                    </div>
                </td>                              
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
