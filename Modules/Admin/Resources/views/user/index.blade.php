@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.user') }}">Thành viên</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý thành viên </h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th style="width: 30%;">Tên khách hàng</th>
          <th style="width: 20%;">Email</th>
          <th style="width: 20%;">Số điện thoại</th>
          <th style="width: 20%;">Hình ảnh</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($users))
            @foreach ($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                  <img src="{{pare_url_file($user->avatar)}}" style="width: 80px; height: 80px;">
                </td>
                <td>
                  <a class="btn btn-xs btn-success" href="{{ route('admin.get.edit.product',$user->id) }}" ><i class="ace-icon fa fa-eye"> </i></a>
                  <a class="btn btn-xs btn-danger"  href="{{ route('admin.get.action.product',['delete',$user->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
