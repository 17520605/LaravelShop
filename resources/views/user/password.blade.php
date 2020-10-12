@extends('user.layout')
@section('content')
<h1 class="page-header">Cập nhật mật khẩu</h1>
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            @csrf
            <div class="form-group" style="position: relative;">
                <label for="email">Mật khẩu cũ:</label>
                <input type="password" class="form-control"  placeholder="*********" name="password_old" value="">
                @if($errors->has('password_old'))
                <span class="error-text">
                    {{$errors->first('password_old')}}
                </span>
                @endif
            </div>
            <div class="form-group" style="position: relative;">
                <label for="email">Mật khẩu mới:</label>
                <input type="password" class="form-control" placeholder="*********" name="password" value="">
                @if($errors->has('password'))
                <span class="error-text">
                    {{$errors->first('password')}}
                </span>
                @endif
            </div>
            <div class="form-group" style="position: relative;">
                <label for="email">Nhập lại mật khẩu mới:</label>
                <input type="password" class="form-control" placeholder="*********" name="password_new_confirm" value="">
                @if($errors->has('password_new_confirm'))
                <span class="error-text">
                    {{$errors->first('password_new_confirm')}}
                </span>
                @endif
            </div>
            
            
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@stop
