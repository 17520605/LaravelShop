
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang quản trị</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/256/Ark-icon.png">
    <link href="{{ asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Xin chào {{ get_data_user('admins','name')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Cài đặt</a></li>
            <li><a href="#">Cá nhân</a></li>
            <li><a href="{{ route('admin.logout') }}">Đăng xuất</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Tìm kiếm...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }} " >
              <a href="{{ route('admin.home')}}">Trang tổng quan</a>
            </li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.category'     ? 'active' : '' }} " ><a href="{{ route('admin.get.list.category'     )}}">Danh mục</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.product'      ? 'active' : '' }} " ><a href="{{ route('admin.get.list.product'      )}}">Sản phẩm</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.rating'       ? 'active' : '' }} " ><a href="{{ route('admin.get.list.rating'       )}}">Đánh giá </a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.article'      ? 'active' : '' }} " ><a href="{{ route('admin.get.list.article'      )}}">Tin Tức</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.transaction'  ? 'active' : '' }} " ><a href="{{ route('admin.get.list.transaction'  )}}">Đơn hàng</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.user'         ? 'active' : '' }} " ><a href="{{ route('admin.get.list.user'         )}}">Thành viên</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.contact'      ? 'active' : '' }} " ><a href="{{ route('admin.get.list.contact'      )}}">Liên hệ</a></li>
            <li class="{{ \Request::route()->getName() == 'admin.get.list.page_static'  ? 'active' : '' }} " ><a href="{{ route('admin.get.list.page_static'  )}}">Trang tĩnh</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Thành công! </strong> {{ \Session::get('success') }} 
            </div>
          @endif

          @if (\Session::has('danger'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Thất bại! </strong> {{ \Session::get('danger') }}
            </div>
          @endif

          @if (\Session::has('warning'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Thất bại! </strong> {{ \Session::get('warning') }}
            </div>
          @endif

          @yield('content')
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset ('theme_admin/js/bootstrap.min.js')}}"></script>
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#output_img').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      
      $("#input_img").change(function() {
        readURL(this);
      });
    </script>
    @yield('script')
  </body>
</html>
