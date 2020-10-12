@extends('admin::layouts.master')

@section('content')

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.transaction') }}">Đơn hàng</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
      </nav>
</div>
<h3>Quản lý đơn hàng </h3>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th style="width: 30%;">Địa chỉ</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Ngày HĐ</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $transaction)
          <tr>
            <td>#{{$transaction->id}}</td>
            <td>{{isset($transaction->user->name) ? $transaction->user->name: '[N\A]'}}</td>
            <td>{{$transaction->tr_phone}}</td>
            <td>{{$transaction->tr_address}}</td>
            <td>{{number_format($transaction->tr_total,0,',','.')}} VNĐ</td>
            <td>
              @if ($transaction->tr_status==1)
                  <a href="" class=" label label-danger">Đã xữ lý</a>
              @else
                  <a href="{{ route('admin.get.active.transaction', $transaction->id) }}" class=" label label-warning">Chờ xữ lý</a> 
              @endif
            </td>
            <td>
              {{$transaction->created_at->format('d-m-Y')}}
            </td>
            <td>
                <a class="js_order_item btn btn-xs btn-success" data-id={{$transaction->id}} href="{{ route('admin.get.view.order',$transaction->id)}}" ><i class="ace-icon fa fa-eye"> </i></a>
                <a class="btn btn-xs btn-danger" href="{{ route('admin.get.action.transaction', ['delete',$transaction->id]) }}" ><i class="ace-icon fa fa-trash-alt "> </i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div id="myModelOrder" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi tiết mã đơn hàng : #<b class='transaction_id'></b></h4>
        </div>
        <div class="modal-body" id="md_content">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@stop
@section('script')
 <script>
   $(function(){
     $(".js_order_item").click(function(event){
      event.preventDefault();
      let $this = $(this);
      let url =$this.attr('href');
      $(".transaction_id").text($this.attr('data-id'));
      $("#myModelOrder").modal('show');

      $.ajax({
        url: url,
      }).done(function(result){
        console.log(result);
        if(result)
        {
          $("#md_content").html('').append(result);
        }
      });
   });
  })
 </script>
@stop