@extends('frontend.layouts')

@section('title', 'Đăng nhập')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5">

                    <!-- Logo or Heading section -->
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Đăng nhập</h4>
                    </div>

                    <form action="" method="POST">
                        @csrf
                        <!-- Email Input Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Nhập email của bạn">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Password Input Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Nhập mật khẩu của bạn">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Remember me and Forgot Password -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ tôi</label>
                            </div>
                            <a href="#" class="small text-primary">Quên mật khẩu?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2 mt-3 shadow-sm">Đăng nhập</button>
                    </form>

                    <!-- Register link -->
                    <div class="text-center mt-3">
                        <p class="mb-0">Chưa có tài khoản? <a href="#" class="text-primary font-weight-bold">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
