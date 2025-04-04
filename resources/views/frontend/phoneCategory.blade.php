@extends('frontend.layouts')

@section('title', $category->name)

@section('content')
<div class="container mt-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group shadow-sm">
                @foreach ($categories as $cat)
                    <a href="{{ route('frontend.phoneCategory', ['id' => $cat->id]) }}" 
                        class="list-group-item list-group-item-action {{ $cat->id == $category->id ? 'active' : '' }}">
                        <i class="fas fa-mobile-alt me-2"></i> {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>        

        <!-- Danh sách sản phẩm -->
        <div class="col-md-9">
            <h4 class="mb-3">Danh mục: {{ $category->name }}</h4>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0">
                            <a href="{{ route('frontend.detail', $product->id) }}"><img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"></a>
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="card-text text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                                <a href="{{ route('frontend.detail', $product->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
