@extends('admin::layouts.master')

@section('content')
<style>
  .rating .active {
    color: #ff9705 !important;
  }
</style>
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<div class="row">
  <div class="col-sm-12">
    <form class="form-inline">
      <div class="form-group mb-4">
        <input type="text" class="form-control" placeholder="Tên sản phẩm ..." name="name" value="{{ \Request::get('name')}}" >
      </div>
      <div class="form-group mb-2">
        <select name="cate" id="" class="form-control">
          <option value="">Danh mục</option>
          @if (isset($categories))
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : ""}}>{{$category->c_name}}</option>
            @endforeach
          @endif
        </select>
      </div>
      <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
</div>
<h3>Quản lý sản phẩm <a href="{{route('admin.get.create.product')}}"><i class="fas fa-plus-circle"></i></a></h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th style="width: 30%;">Tên sản phẩm</th>
          <th style="width: 20%;">Loại sản phẩm</th>
          <th style="width: 20%;">Hình ảnh</th>
          <th>Trạng thái</th>
          <th>Nỗi bật</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if(@isset($products))
            @foreach ($products as $product)
              <?php 
                $age=0;
                if($product->pro_total_rating)
                {
                  $age = round($product->pro_total_number / $product->pro_total_rating,2);
                }
              ?>
              <tr>
                <td>{{$product->id}}</td>
                <td>
                  {{$product->pro_name}}
                  <ul>
                    <li><span><i class=""></i></span><span>{{number_format($product->pro_price,0,',','.')}} vnđ</span></li>
                    <li><span><i class=""></i></span><span>{{$product->pro_sale}} %</span></li>
                    <li>Đánh giá :
                      <span class="rating">
                        @for($i=1;$i<=5;$i++)
                          <i class="fa fa-star {{$i <= $age ? 'active' : ''}}" style="color:#999;"></i>
                        @endfor
                      </span>
                    </li>
                    <li>
                      <span>Số lượng :</span><span>{{$product->pro_number}}</span>
                    </li>

                  </ul>
                </td>
                <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
                <td>
                  <img src="{{pare_url_file($product->pro_avatar)}}" style="width: 80px; height: 80px;">
                </td>
                <td> 
                  <a href="{{ route('admin.get.action.product',['active',$product->id]) }}" class="label {{$product->getStatus($product->pro_active)['class']}}" > {{$product->getStatus($product->pro_active)['name']}}</a>
                </td>
                <td> 
                  <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}" class="label {{$product->getHot($product->pro_hot)['class']}}" > {{$product->getHot($product->pro_hot)['name']}}</a>
                </td>
                <td>
                  <a class="btn btn-xs btn-success" href="{{ route('admin.get.edit.product',$product->id) }}"><i class="ace-icon fa fa-eye"> </i></a>
                  <a class="btn btn-xs btn-danger"  href="{{ route('admin.get.action.product',['delete',$product->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
                </td>
              </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
@stop
