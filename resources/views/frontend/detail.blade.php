@extends('frontend.layouts')

@section('title', $product->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <div class="border p-3">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100">
                </div>
                <div class="mt-2 d-flex">
                    {{-- @foreach ($product->images as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="img-thumbnail me-2" width="70">
                    @endforeach --}}
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <div class="d-flex align-items-center">
                    <span class="text-warning me-2">
                        ★★★★☆ ({{ $product->reviews_count }} đánh giá)
                    </span>
                </div>

                <p class="text-danger fs-3 fw-bold">
                    {{ number_format($product->price, 0, ',', '.') }} đ
                </p>

                <!-- Nút mua hàng -->
                <div class="mt-4">
                    <a href="#" class="btn btn-danger btn-lg d-flex flex-column align-items-center">
                        <span class="fw-bold fs-6">MUA NGAY</span>
                        <small class="fw-light fs-6">(Nhận tại cửa hàng hoặc giao tận nhà)</small>
                    </a>
                </div>
            </div>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="mt-5 border-5 p-3 shadow-sm r">
            <h5>Thông tin sản phẩm</h5>
            <p>{{ $product->description }}</p>
        </div>
    </div>
@endsection