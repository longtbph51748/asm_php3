<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Navbar */
        .navbar-custom {
            background-color: #000099;
            /* Màu đỏ */
            padding: 10px 0;
        }

        .navbar-custom .btn-custom {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
        }

        .navbar-custom .btn-custom i {
            margin-right: 8px;
        }

        .navbar-custom .search-bar {
            flex-grow: 1;
            position: relative;
        }

        .navbar-custom .search-bar input {
            border-radius: 20px;
            border: none;
            padding: 10px 40px;
            width: 100%;
        }

        .navbar-custom .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        .navbar-custom .nav-icons a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-custom .nav-icons i {
            font-size: 20px;
            margin-right: 5px;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

        footer{
            background: #000099;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                Phone<span class="fw-light">HUB</span>
            </a>

            <!-- Dropdown Danh Mục -->
            <div class="dropdown">
                <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-bars"></i> Danh Mục
                </button>
                <ul class="dropdown-menu">
                    {{-- @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="">{{ $category->name }}</a></li>
                    @endforeach --}}
                </ul>
            </div>

            <!-- Ô tìm kiếm -->
            <form action="{{ route('frontend.search') }}" method="GET" class="search-bar ms-3">
                <i class="fas fa-search"></i>
                <input type="text" name="q" class="form-control" placeholder="Bạn cần tìm gì?" value="{{ request()->q }}">
            </form>            

            <!-- Icon menu phải -->
            <div class="nav-icons d-flex align-items-center">
                <a href="#"><i class="fas fa-phone"></i> Gọi mua hàng 1800.2097</a>
                {{-- <a href="#"><i class="fas fa-map-marker-alt"></i> Cửa hàng gần bạn</a> --}}
                <a href="#"><i class="fas fa-truck"></i> Tra cứu đơn hàng</a>
                <a href="#"><i class="fas fa-shopping-bag"></i> Giỏ hàng</a>

                <!-- Đăng nhập -->
                <div class="dropdown">
                    <button class="btn btn-custom" onclick="window.location.href='{{ route('frontend.login') }}'">
                        <i class="fas fa-user"></i> Đăng nhập
                    </button>                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Nội dung động -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center p-3 mt-4">
        &copy; 2025 PhoneHUB. All Rights Reserved. Trần Bảo Long - PH51748.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>