@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.user') }}">Liên hệ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý liên hệ </h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tiêu đề</th>
          <th>Họ tên</th>
          <th>Email</th>
          <th>Nội dung</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($contacts))
            @foreach ($contacts as $contact)
              <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->c_title}}</td>
                <td>{{$contact->c_name}}</td>
                <td>{{$contact->c_email}}</td>
                <td>{{$contact->c_content}}</td>
                <td>
                  @if ($contact->c_status==1)
                      <a href="" class=" label label-danger">Đã xữ lý</a>
                  @else
                      <a href="" class=" label label-warning">Chờ xữ lý</a>
                  @endif
                </td>
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
