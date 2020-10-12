@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Trang tĩnh</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý danh mục <a href="{{route('admin.get.create.page_static')}}" ><i class="fas fa-plus-circle"></i></a></h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tiêu đề trang</th>
          <th>Ngày tạo</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($pages))
            @foreach ($pages as $page)
              <tr>
                <td>{{$page->id}}</td>
                <td>{{$page->ps_name}}</td>
                <td>
                  {{$page->created_at}}
                </td>
                <td>
                  <a class="btn btn-xs btn-success" href="{{ route('admin.get.edit.page_static',$page->id) }}" ><i class="ace-icon fa fa-eye"> </i></a>
                  <a class="btn btn-xs btn-danger"  href="{{ route('admin.get.action.page_static',['delete',$page->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
