@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý danh mục <a href="{{route('admin.get.create.category')}}" ><i class="fas fa-plus-circle"></i></a></h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên danh mục</th>
          <th>Title seo</th>
          <th>Đề xuất</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($categories))
            @foreach ($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->c_name}}</td>
                <td>{{$category->c_title_seo}}</td>
                <td> 
                  <a href="{{ route('admin.get.action.category',['home',$category->id]) }}" class="label {{$category->getHome($category->c_home)['class']}}"> {{$category->getHome($category->c_home)['name']}}</a>
                </td>
                <td> 
                  <a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="label {{$category->getStatus($category->c_active)['class']}}"> {{$category->getStatus($category->c_active)['name']}}</a>
                </td>
                <td>
                  <a class="btn btn-xs btn-success" href="{{ route('admin.get.edit.category',$category->id) }}" ><i class="ace-icon fa fa-eye"> </i></a>
                  <a class="btn btn-xs btn-danger"  href="{{ route('admin.get.action.category',['delete',$category->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
