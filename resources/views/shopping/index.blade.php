@extends('layouts.app')
@section('content') 
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Giỏ hàng của bạn </h2>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              @foreach ($products as $key => $product)
              <tr>
                <td>{{$i}}</td>
                <td style="width: 30%;"><a href="">{{$product->name}}</a></td>
                <td>
                  <img style="width: 80px;height: 80px;" src="{{pare_url_file($product->options->avatar)}}" alt="">
                </td>
                <td>{{number_format($product->price,0,',','.')}} đ</td>
                <td>{{$product->qty}}</td>
                <td>{{number_format($product->qty * $product->price,0,',','.')}} đ</td>
                <td>
                    <a class="btn btn-xs btn-success">
                        <i class="ace-icon fa fa-pencil"> </i>
                    </a>
                    <a href="{{ route('delete.shopping.cart',$key) }}" class="btn btn-xs btn-danger">
                      <i class="ace-icon fa fa-trash-o "> </i>
                    </a>
                </td>
              </tr>
              <?php $i ++ ?>
              @endforeach
            </tbody>
          </table>
          <h5 class="pull-right">Tổng tiền cần thanh toán :{{\cart::subtotal()}} <a href="{{ route('get.form.pay')}}" class="btn-success btn ">Thanh toán</a> </h5>
    </div>
</div>
@stop