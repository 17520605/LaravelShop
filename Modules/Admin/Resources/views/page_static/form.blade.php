<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề trang :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" required placeholder="Tiêu đề trang" value="{{ old('ps_name', isset($page->ps_name) ? $page->ps_name : '')}}" name="ps_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Chọn trang :</label>
        <div class="col-sm-10">
            <select name="ps_type" class="form-control">
                <option value="1">Về chúng tôi</option>
                <option value="2">Thông tin giao hàng</option>
                <option value="3">Chính sách bảo mật</option>
                <option value="4">Điều khoản sử dụng</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung :</label>
        <div class="col-sm-10">
            <textarea name="ps_content" id="ps_content" class="form-control" cols="30" rows="3" placeholder="Nội dung">{{ old('ps_content', isset($page->ps_content) ? $page->ps_content : '')}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class=" col-md-3 offset-md-3">
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </div>
    </div>
</form>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ps_content');
    </script>
@stop