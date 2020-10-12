@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<div class="row">
  <div class="col-sm-12">
    <form class="form-inline">
      <div class="form-group mb-4">
        <input type="text" class="form-control" placeholder="Tên bài viết ..." name="name" value="{{ \Request::get('name')}}" >
      </div>
      <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
</div>
<h3>Quản lý danh mục <a href="{{route('admin.get.create.article')}}" ><i class="fas fa-plus-circle"></i></a></h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th style="width: 20%;">Tên bài viết</th>
          <th style="width: 15%;">Hình ảnh</th>
          <th style="width: 25%;">Mô tả </th>
          <th style="width: 10%; text-align: center;">Nỗi bật</th>
          <th style="width: 10%;">Trạng thái</th>
          <th style="width: 10%;">Ngày tạo</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($articles))
            @foreach ($articles as $article)
              <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->a_name}}</td>
                <td>
                  <img src="{{pare_url_file($article->a_avatar)}}" style="width: 120px; height: 80px;">
                </td>
                <td>{{$article->a_description}}</td>
                <td style="text-align: center"> 
                  <a href="{{ route('admin.get.action.article',['hot',$article->id]) }}" class="label {{$article->getHot($article->a_hot)['class']}}" > {{$article->getHot($article->a_hot)['name']}}</a>
                </td>
                <td> 
                  <a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="label {{$article->getStatus($article->a_active)['class']}}" > {{$article->getStatus($article->a_active)['name']}}</a>
                </td>
                <td>
                  {{$article->created_at}}
                </td>
                <td>
                  <a class="btn btn-xs btn-success" href="{{ route('admin.get.edit.article',$article->id) }}" ><i class="ace-icon fa fa-eye"> </i></a>
                  <a class="btn btn-xs btn-danger"  href="{{ route('admin.get.action.article',['delete',$article->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
