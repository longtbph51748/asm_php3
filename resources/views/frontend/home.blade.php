<style>
    .card-title a {
        text-decoration: none; /* Xóa gạch chân */
        color: inherit; /* Giữ nguyên màu chữ */
    }
    .card-title a:hover {
        color: #4b4b4b; /* Màu chữ khi hover */
    }
</style>
@extends('frontend.layouts')
@section('title', 'Trang Chủ')

@section('content')
<div class="container mt-3">
    <div class="row">
        <!-- Sidebar - Danh Mục -->
        <div class="col-md-3">
            <div class="list-group shadow-sm">
                <a href="{{ route('frontend.phoneCategory', ['id' => 1]) }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-mobile-alt me-2"></i> Điện thoại, Tablet
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-laptop me-2"></i> Laptop
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger">
                    <i class="fas fa-headphones-alt me-2"></i> Âm thanh
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-camera me-2"></i> Đồng hồ, Camera
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-home me-2"></i> Đồ gia dụng
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-plug me-2"></i> Phụ kiện
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-desktop me-2"></i> PC, Màn hình, Máy in
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-tv me-2"></i> Tivi
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-sync-alt me-2"></i> Thu cũ đổi mới
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-box-open me-2"></i> Hàng cũ
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-tags me-2"></i> Khuyến mãi
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-newspaper me-2"></i> Tin công nghệ
                </a>
            </div>
        </div>        

        <!-- Banner + Sản phẩm -->
        <div class="col-md-9">
            <!-- Banner chính -->
            <div id="mainCarousel" class="carousel slide mb-3 shadow-sm" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://taoquangsang.vn/wp-content/uploads/2024/10/iphone-16-banner-2.jpg" class="d-block w-100 rounded" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/a56-a36-home-mua-kem.png" class="d-block w-100 rounded" alt="Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/lenovo-home-25-03.png" class="d-block w-100 rounded" alt="Banner 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="hot-sale-section mb-3 p-3 bg-danger text-white rounded">
                <h4 class="text-center fw-bold">🔥 Sản phẩm mới 🔥</h4>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0">
                            <a href="{{ route('frontend.detail', $product->id) }}"><img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" width="100"></a>
                            <div class="card-body text-center">
                                <h6 class="card-title"><a href="{{ route('frontend.detail', $product->id) }}">{{ $product->name }}</a></h6>
                                <p class="card-text text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                                {{-- <a href="{{ route('frontend.detail', $product->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>

@endsection
