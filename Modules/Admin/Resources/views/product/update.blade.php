@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}" title="Sản phẩm">Sản phẩm</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
        </ol>
      </nav>
</div>
<div class="container">
    <div class="row">
        @include("admin::product.form")
    </div>
</div>

@stop
