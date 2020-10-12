<!-- product section start -->
@if (!empty($productSuggest))
	<div class="">
		<div class="container">
			<div class="area-title">
				<h2> Một số sản phẩm cùng danh mục bạn đã mua</h2>
			</div>
			<!-- our-product area start -->
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						@foreach ($productSuggest as $product)
						<div class="col-lg-3 col-md-3">
							<div class="single-product first-sale">
								<div class="product-img">
									@if ($product->pro_number ==0)
										<span style="position: absolute; background: #fbda00;color: #333;font-size: 12px;padding: 2px 6px;">Tạm hết hàng</span>
									@endif
									@if ($product->pro_sale)
										<span style="position: absolute; background-image: linear-gradient(-90deg,#ec1f1f 0% ,#ff9c00 100%);color: #ffff;font-size: 12px;padding: 2px 6px; right: 0; border-radius: 10px;">{{$product->pro_sale}} % </span>
									@endif
									<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
										<img class="primary-image" src="{{asset(pare_url_file($product->pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{asset(pare_url_file($product->pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom"> 
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart',$product->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>									
											</div>
											<div class="quickviewbtn">
												<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($product->pro_price,0,',','.')}}đ</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="{{ route('get.detail.product', [$product->pro_slug,$product->id]) }}">{{$product->pro_name}}</a></h2>
								</div>
							</div>
						</div>
						@endforeach
						<!-- single-product end -->
					</div>	
				</div>
			</div>
			<!-- our-product area end -->	
		</div>
	</div>
@endif
<!-- product section end -->