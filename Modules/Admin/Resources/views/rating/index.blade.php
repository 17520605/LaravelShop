@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.user') }}">Đánh giá</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý đánh giá </h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th style="width: 20%;">Tên thành viên</th>
          <th style="width: 20%;">Tên sản phẩm</th>
          <th style="width: 30%;">Nội dung</th>
          <th style="width: 15%;">Rating</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($ratings))
            @foreach ($ratings as $rating)
              <tr>
                <td>{{$rating->id}}</td>
                <td>{{isset($rating->user->name) ? $rating->user->name : '[N\A]'}}</td>
                <td><a href="">{{isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]'}}</a></td>
                <td>{{$rating->ra_content}}</td>
                <td>{{$rating->ra_number}}</td>
                <td>
                  <a class="btn btn-xs btn-danger" href="" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
