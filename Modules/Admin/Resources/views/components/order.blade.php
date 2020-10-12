@if ($orders)
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
      <?php $i=1 ?>
      @foreach ($orders as $key => $order)
      <tr>
        <td>{{$i}}</td>
        <td><a href="{{ route('get.detail.product', [str_slug($order->product->pro_name), $order->or_product_id]) }}" target="_blank">{{isset($order->product->pro_name) ? $order->product->pro_name : ''}}</a></td>
        <td>
          <img style="width: 80px;height: 80px;" src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : ''}}" alt="">
        </td>
        <td>{{number_format($order->or_price,0,',','.')}} đ</td>
        <td>{{$order->or_qty}}</td>
        <td>{{number_format($order->or_qty * $order->or_price,0,',','.')}} đ</td>
        <td>
            <a href="" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-alt "></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif