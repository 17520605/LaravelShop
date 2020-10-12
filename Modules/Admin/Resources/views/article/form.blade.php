<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên bài viết :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Tên bài viết" value="{{ old('a_name', isset($article->a_name) ? $article->a_name : '')}}" name="a_name">
            @if($errors->has('a_name'))
                <span class="error-text">
                    {{$errors->first('a_name')}}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row row col-sm-offset-2">
        <div class="col-sm-10">
            <img id="output_img" src="{{asset('images/default-img.jpg')}}" style="width:200px;" alt="">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh :</label>
        <div class="col-sm-10">
            <input name="avatar" id="input_img" type="file" class="form-control" >
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả :</label>
        <div class="col-sm-10">
            <textarea name="a_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ">{{ old('a_description', isset($article->a_description) ? $article->a_description : '')}}</textarea>
            @if($errors->has('a_description'))
                <span class="error-text">
                    {{$errors->first('a_description')}}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung :</label>
        <div class="col-sm-10">
            <textarea name="a_content" id="a_content" class="form-control" cols="30" rows="3" placeholder="Nội dung">{{ old('a_content', isset($article->a_content) ? $article->a_content : '')}}</textarea>
            @if($errors->has('a_content'))
                <span class="error-text">
                    {{$errors->first('a_content')}}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Meta titel" value="{{ old('c_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}" name="a_title_seo">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Meta Description" value="{{ old('c_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}" name="a_description_seo">
        </div>
    </div>
    <div class="form-group row col-sm-2 col-sm-offset-2">
        <div class="checkbox">
            <label><input type="checkbox" name="hot">Nỗi bật</label>
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
        CKEDITOR.replace('a_content');
    </script>
@stop