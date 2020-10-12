<form action="" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên danh mục :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Tên danh mục" value="{{ old('name', isset($category->c_name) ? $category->c_name : '')}}" name="name">
            @if($errors->has('name'))
                <span class="error-text">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Icon :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="fa fa-home" value="{{ old('icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="icon">
            @if($errors->has('icon'))
                <span class="error-text">
                    {{$errors->first('icon')}}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Meta titel" value="{{ old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}" name="c_title_seo">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Meta Description" value="{{ old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}" name="c_description_seo">
        </div>
    </div>
    <div class="form-group col-sm-2 col-sm-offset-2" >
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