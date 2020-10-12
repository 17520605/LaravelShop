<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Loại sản phẩm :</label>
        <div class="col-sm-10">
            <select name="pro_category_id" class="form-control">
                <option value="">--Chọn Loại Sản Phẩm--</option>
                @if(isset($categories))
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('pro_category_id', isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'" : ""}} >{{$category->c_name}}</option>
                    @endforeach
                @endif
            </select>
            @if($errors->has('pro_category_id'))
                <span class="error-text">
                    {{$errors->first('pro_category_id')}}
                </span>
            @endif    
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên sản phẩm :</label>
        <div class="col-sm-10">
            <input name="pro_name" type="text" class="form-control" placeholder="Tên sản phẩm" value="{{ old('pro_name', isset($product->pro_name) ? $product->pro_name : '')}}" >
            @if($errors->has('pro_name'))
                <span class="error-text">
                    {{$errors->first('pro_name')}}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Giá sản phẩm :</label>
        <div class="col-sm-10">
            <input type="number" name="pro_price" class="form-control" placeholder="Giá sản phẩm" value="{{ old('pro_price', isset($product->pro_price) ? $product->pro_price : '')}}" >
                @if($errors->has('pro_price'))
                <span class="error-text">
                    {{$errors->first('pro_price')}}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">% Khuyến mãi :</label>
        <div class="col-sm-10">
            <input name="pro_sale" type="number" class="form-control" placeholder="% giảm giá" value="{{ old('pro_sale', isset($product->pro_sale) ? $product->pro_sale : '0')}}" >
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Số lượng sản phẩm :</label>
        <div class="col-sm-10">
            <input name="pro_number" type="number" class="form-control" placeholder="10" value="{{ old('pro_number', isset($product->pro_number) ? $product->pro_number : '0')}}" >
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
            <textarea name="pro_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn về sản phẩm">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
            @if($errors->has('pro_description'))
                <span class="error-text">
                    {{$errors->first('pro_description')}}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung :</label>
        <div class="col-sm-10">
            <textarea name="pro_content" id="pro_content" class="form-control" cols="30" rows="3" placeholder="Nội dung">{{ old('pro_content', isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
            @if($errors->has('pro_content'))
                <span class="error-text">
                    {{$errors->first('pro_content')}}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title :</label>
        <div class="col-sm-10">
            <input name="pro_title_seo" type="text" class="form-control" placeholder="Meta titel" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}" >
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description :</label>
        <div class="col-sm-10">
            <input name="pro_description_seo" type="text" class="form-control" placeholder="Meta Description" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}" >
        </div>
    </div>
    <div class="form-group row col-sm-2 col-sm-offset-2">
        <div class="checkbox">
            <label><input type="checkbox" name="hot">Nỗi bật</label>
        </div>
    </div>
    <div class="form-group row">
        <div class=" col-md-3 offset-md-3">
            <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
        </div>
    </div>
</form>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@stop