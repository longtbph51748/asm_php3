@extends('backend.layouts')

@section('title', 'Thêm danh mục')

@section('content')
    <div class="container mt-4">
        <h2>Thêm danh mục mới</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>
@endsection
