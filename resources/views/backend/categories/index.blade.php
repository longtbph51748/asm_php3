@extends('backend.layouts')
@section('title', 'Quản lý danh mục')

@section('content')
    <h2>Danh sách danh mục</h2>

    @session('message')
        <div class="alert text-success">
            {{session('message')}}
        </div>
    @endsession
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Thêm danh mục</a>
    <div></div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection