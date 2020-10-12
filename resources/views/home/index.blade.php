@extends('layouts.app')
@section('content')
<style>
	.pro-rating .active {
        color: #ff9705;
    }
</style>
@include('components.slide')
<!-- product section start -->
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Sản phẩm nỗi bật</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						<!-- single-product start -->
						@foreach ($productHot as $proHot)
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if ($proHot->pro_number == 0 )
										<span style="position: absolute; background: #fbda00;color: #333;font-size: 12px;padding: 2px 6px;">Tạm hết hàng</span>
									@endif
									@if ($proHot->pro_sale)
										<span style="position: absolute; background-image: linear-gradient(-90deg,#ec1f1f 0% ,#ff9c00 100%);color: #ffff;font-size: 12px;padding: 2px 6px; right: 0; border-radius: 10px;">{{$proHot->pro_sale}} % </span>
									@endif
									<a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}">
										<img class="primary-image" src="{{asset(pare_url_file($proHot->pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{asset(pare_url_file($proHot->pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom"> 
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart',$proHot->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>									
											</div>
											<div class="quickviewbtn">
												<a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($proHot->pro_price,0,',','.')}}đ</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="{{ route('get.detail.product', [$proHot->pro_slug,$proHot->id]) }}">{{$proHot->pro_name}}</a></h2>
								</div>
							</div>
						</div>
						@endforeach
						<!-- single-product end -->
					</div>
				</div>	
			</div>
		</div>
		<!-- our-product area end -->	
	</div>
</div>
<!-- product section end -->

@include('components.product_suggest')

<div id="product_view"></div>

@if (isset($articleNews))


<div class="latest-post-area">
	<div class="container">
		<div class="area-title">
			<h2>Bài viết</h2>
		</div>
		<div class="row">
			<div class="all-singlepost">
				<!-- single latestpost start -->
				@foreach ($articleNews as $arNew)
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-post">
						<div class="post-thumb">
							<a href="#">
								<img src="{{asset(pare_url_file($arNew->a_avatar)) }}" alt="" style="width: 370px;height: 200px;" />
							</a>
						</div>
						<div class="post-thumb-info">
							<div class="postexcerpt">
								<p>{{ $arNew->a_name }}</p>
								<a href="#" class="read-more">Xem thêm</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- single latestpost end -->
			</div>
		</div>
	</div>
</div>
@endif
<!-- latestpost area end -->
<!-- block category area start -->
<div class="block-category">
	<div class="container">
		<div class="row">
			@if (isset($categoriesHome))
				@foreach ($categoriesHome as $categoryHome)
				<div class="col-md-4">
					<!-- block title start -->
					<div class="block-title">
						<h2>{{$categoryHome->c_name}}</h2>
					</div>
					@if (isset($categoryHome->products))
						<div class="block-carousel">
							@foreach ($categoryHome->products as $product)
								<?php 
									$ageDetail=0;
									if($product->pro_total_rating)
									{
										$ageDetail = round($product->pro_total_number / $product->pro_total_rating,2);
									}
								?>	
								<div class="block-content">
									<div class="single-block">
										<div class="block-image pull-left">
											<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{asset(pare_url_file($product->pro_avatar)) }}" style="width: 180px;height: 208px;" alt=""/></a>
										</div>
										<div class="category-info" style="text-align: center">
											<h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{$product->pro_name}}</a></h3>
											<p>{{$product->pro_description}}</p>
											<div class="cat-price" style="margin-bottom: 1px;font-size: 18px">{{number_format($product->pro_price,0,',','.')}}đ</div>
											<span class="old-price" style="margin-bottom: 20px;font-size: 15px" >{{number_format($product->pro_price,0,',','.')}}đ</span>
											<div class="cat-rating">
												<div class="pro-rating">
													@for( $i=1; $i<=5 ; $i++)
														<a href="#"><i class="fa fa-star {{$i <= $ageDetail ? 'active' : ''}}"></i></a>
													@endfor
												</div>
											</div>								
										</div>
									</div>
								</div>
							@endforeach	
						</div>
					@endif	
				</div>						
				@endforeach
			@endif
		</div>
	</div>
</div>
<div class="testimonial-area lap-ruffel">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="crusial-carousel">
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>BootExperts</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>Lavoro Store!</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>MR Selim Rana</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				<div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
			</div>
		</div>
	</div>
</div>
<!-- Brand Logo Area End -->
@stop

@section('script')
	<script>
		$(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			let routeRenderProduct = '{{ route('post.product.view') }}';
			CheckRenderProduct = false;
			$(document).on( 'scroll', function()
			{
				if ($(window).scrollTop() > 150 && CheckRenderProduct == false) 
				{
					CheckRenderProduct = true;
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
				}
			});
		})
	</script>
@stop