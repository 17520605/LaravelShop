@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Lấy lại mật khẩu</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style=" margin-top: 10% ; margin-bottom: 10%">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Vui lòng nhập địa chỉ email hoặc số điện thoại của bạn để tìm kiếm tài khoản của bạn. </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('email') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-offset-7">
                                <button type="submit" class="btn btn-primary">Gửi xác nhận lấy mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
