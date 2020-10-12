@extends('user.layout')
@section('content')
<style>
  .row{
    margin-top: 20px;
  }
  .product-img img{
    max-width: 200px;
    max-height: 200px;
  }
  .secondary-image, .actions, .action-zoom ,span{
    display: none;
  }
  .product-name{
    font-size: 15px;
  }
  .area-title{
    display: none;
  }
  .single-product ,.first-sale{
    text-align: center;
    margin-top: 10px;
  }

</style>
<div class="row">
  <div class="col-sm-12">
    <h2 style="text-align: center">Danh sách các sản phẩm bạn quan tâm</h2>
    <div id="product_view">

    </div>
  </div>
</div>
@stop

@section('script')
	<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			let routeRenderProduct = '{{ route('post.product.view') }}';
			CheckRenderProduct = false;
      let products = localStorage.getItem('products');
      products = $.parseJSON(products)
      
      if(products.length > 0){
        $.ajax({
          url:routeRenderProduct,
          method:"POST",
          data:{id:products},
          success:function(result)
          {
            $("#product_view").html('').append(result.data)
          }
        });
      }
	</script>
@stop