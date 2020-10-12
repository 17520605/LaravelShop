@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.page_static') }}" title="Trang tĩnh">Trang tĩnh</a></li>
          <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
      </nav>
</div>
<div class="container">
    <div class="row">
        @include("admin::page_static.form")
    </div>
</div>
@stop