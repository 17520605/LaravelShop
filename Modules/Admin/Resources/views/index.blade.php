@extends('admin::layouts.master')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .highcharts-figure, .highcharts-data-table table {
      min-width: 310px; 
      max-width: 800px;
      margin: 1em auto;
    }
    
    #container {
      height: 400px;
    }
    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #EBEBEB;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }
    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
      padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
</style>
<h1 class="page-header">Trang tổng quan</h1>
<div class="row placeholders">
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
    <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%);margin: 0;color: white;">100 Thành viên</h4>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
    <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%);margin: 0;color: white;">100 Sản phẩm </h4>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
    <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%);margin: 0;color: white;">100 Bài viết</h4>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
    <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%);margin: 0;color: white;">100 Đánh giá</h4>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <figure class="highcharts-figure">
      <div id="container"></div>
      <p class="highcharts-description"></p>
    </figure>
  </div>
  <div class="col-sm-8">
    <h3>Danh sách đơn hàng mới</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Ngày HĐ</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactionsNews as $transaction)
          <tr>
            <td>#{{$transaction->id}}</td>
            <td>{{isset($transaction->user->name) ? $transaction->user->name: '[N\A]'}}</td>
            <td>{{$transaction->tr_phone}}</td>
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
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <h3 class="sub-header">Danh sách đánh giá mới</h3>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên thành viên</th>
            <th>Tên sản phẩm</th>
            <th>Rating</th>
          </tr>
        </thead>
        <tbody>
          @if(@isset($ratings))
              @foreach ($ratings as $rating)
                <tr>
                  <td>{{$rating->id}}</td>
                  <td>{{isset($rating->user->name) ? $rating->user->name : '[N\A]'}}</td>
                  <td><a href="">{{isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]'}}</a></td>
                  <td>{{$rating->ra_number}}</td>
                </tr>
              @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-8">
    <h3 class="sub-header">Danh sách liên hệ mới</h3>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Họ tên</th>
            <th>Nội dung</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          @if(@isset($contacts))
              @foreach ($contacts as $contact)
                <tr>
                  <td>{{$contact->id}}</td>
                  <td>{{$contact->c_title}}</td>
                  <td>{{$contact->c_name}}</td>
                  <td>{{$contact->c_content}}</td>
                  <td>
                    @if ($contact->c_status==1)
                        <a class=" label label-danger">Đã xữ lý</a>
                    @else
                        <a class=" label label-warning">Chờ xữ lý</a>
                    @endif
                  </td>
                </tr>
              @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
@section('script')
  <script>
    let data = " {{ $dataMoney }}";

    dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
    // Create the chart
    Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Biểu đồ doanh thu'
      },
      accessibility: {
        announceNewData: {
          enabled: true
        }
      },
      xAxis: {
        type: 'category'
      },
      yAxis: {
        title: {
          text: 'Mức doanh thu'
        }

      },
      legend: {
        enabled: false
      },
      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
            format: '{point.y:.1f} VND'
          }
        }
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
      },

      series: [
        {
          name: "Browsers",
          colorByPoint: true,
          data: dataChart
        }
      ]
    });
  </script>
@stop
