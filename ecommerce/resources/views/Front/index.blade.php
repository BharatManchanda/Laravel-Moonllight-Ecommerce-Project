@extends("Front/layout")
@section('container')
<!-- Start slider -->
<section id="aa-slider">
	<div class="aa-slider-area">
		<div id="sequence" class="seq">
			<div class="seq-screen">
				<ul class="seq-canvas">

					<!-- single slide item -->
					@foreach($homebanner as $val)
					<li>
						<div class="seq-model">
							<img data-seq src="{{asset('storage/banners/'.$val->banner_image)}}" alt="Men slide img" />
						</div>
						<div class="seq-title">
							<span data-seq>{{$val->banner_percentage}}</span>
							<h2 data-seq>{{$val->banner_title}}</h2>
							<p data-seq>{{$val->banner_desc}}</p>
							<a data-seq href="{{url($val->button_link)}}" class="aa-shop-now-btn aa-secondary-btn">{{$val->button_txt}}</a>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			<!-- slider navigation btn -->
			<fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
				<a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
				<a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
			</fieldset>
		</div>
	</div>
</section>
<!-- / slider -->
<!-- Start Promo section -->
<section id="aa-promo">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-promo-area">
					<div class="row">
						@php
							$n=1;
						@endphp
						@foreach($categories as $list)
							@if($n==1)
							<!-- promo left -->
							<div class="col-md-5 no-padding">
								<div class="aa-promo-left">
									<div class="aa-promo-banner">
										<img src="{{asset('Storage/categories/'.$list->category_image)}}" alt="img">
										<div class="aa-prom-content">
											<span>75% Off</span>
											<h4><a href="#">For Women</a></h4>
										</div>
									</div>
								</div>
							</div>
							<!-- promo right -->
							<div class="col-md-7 no-padding">
								<div class="aa-promo-right">
									@php
										$n++;
									@endphp
									@elseif ( $n > 1 )
									<div class="aa-single-promo-right">
										<div class="aa-promo-banner">
											<img src="{{asset('storage/categories/'.$list->category_image)}}" alt="img">
											<div class="aa-prom-content">
												<span>Exclusive Item</span>
												<h4><a href="#">For {{$list->category_name}}</a></h4>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- / Promo section -->


<!-- Products section -->
<section id="aa-product">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="aa-product-area">
						<div class="aa-product-inner">
							<!-- start prduct navigation -->
							<ul class="nav nav-tabs aa-products-tab">
								@php
									$loopC=1;
								@endphp
								@foreach($categories as $val)
									@php
										$sta="";
										if($loopC==1){
											$sta="in active";
											$loopC++;
										}
									@endphp
									<li class="{{$sta}}"><a href="#cat_{{$val->id}}" data-toggle="tab">{{$val->category_name}}</a>
									</li>
								@endforeach
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<!-- Start men product category -->
								@php
									$loopC=1;
								@endphp
								@foreach($categories as $val)
									@php
										$sta="";
										if($loopC==1){
											$sta="in active";
											$loopC++;
										}
									@endphp
									<div class="tab-pane fade {{$sta}}" id="cat_{{$val->id}}">
									@if(isset($products[$val->id][0]))
										<ul class="aa-product-catg" style="width: 100%; margin:0px">
											@foreach($products[$val->id] as $key => $data)
												<li style="{{ $key % 4 == 0 ? 'margin: 0px;' : '' }}">
													<figure>
														<a class="aa-product-img" href="{{url('product/'.$data->slug)}}"><img width="250px" height="300px" src="{{asset('storage/products/'.$data->image)}}" alt="polo shirt img"></a>
														<a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_cart({{$data->id}}, '{{$product_attrs[$data->id][0]->size}}', '{{$product_attrs[$data->id][0]->color}}')">
															<span class="fa fa-shopping-cart"></span>Add To Cart
														</a>
														<figcaption>
															<h4 class="aa-product-title"><a href="#">{{substr($data->title,0,25)."..."}}</a></h4>
															<span class="aa-product-price">₹ {{$product_attrs[$data->id][0]->price}}</span>
															<span class="aa-product-price"><del>₹ {{$product_attrs[$data->id][0]->mrp}}</del></span>
														</figcaption>
													</figure>
													<div class="aa-product-hvr-content">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
														<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
														<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
													</div>
													<!-- product badge -->
													<span class="aa-badge aa-sale" href="#">SALE!</span>
												</li>
											@endforeach
										</ul>
										@if (count($products[$val->id]) > 5)
											<div style="margin-bottom: 20px; text-align: center;">
												<a class="aa-browse-btn" href="#">
													Browse all Product <span class="fa fa-long-arrow-right"></span>
												</a>
											</div>
										@endif
										@else
											<h3 class="text-center">No Product Found</h3>
										@endif
									</div>
								@endforeach
							</div>
						</div>
						<!-- quick view modal -->
						<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<div class="row">
											<!-- Modal view slider -->
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="aa-product-view-slider">
													<div class="simpleLens-gallery-container" id="demo-1">
														<div class="simpleLens-container">
															<div class="simpleLens-big-image-container">
																<a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
																	<img src="{{asset('front_asset/img/view-slider/medium/polo-shirt-1.png')}}" class="simpleLens-big-image">
																</a>
															</div>
														</div>
														<div class="simpleLens-thumbnails-container">
															<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
																<img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-1.png')}}">
															</a>
															<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
																<img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-3.png')}}">
															</a>

															<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
																<img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-4.png')}}">
															</a>
														</div>
													</div>
												</div>
											</div>
											<!-- Modal view content -->
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="aa-product-view-content">
													<h3>T-Shirt</h3>
													<div class="aa-price-block">
														<span class="aa-product-view-price">$34.99</span>
														<p class="aa-product-avilability">Avilability: <span>In stock</span></p>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
													<h4>Size</h4>
													<div class="aa-prod-view-size">
														<a href="#">S</a>
														<a href="#">M</a>
														<a href="#">L</a>
														<a href="#">XL</a>
													</div>
													<div class="aa-prod-quantity">
														<form action="">
															<select name="" id="">
																<option value="0" selected="1">1</option>
																<option value="1">2</option>
																<option value="2">3</option>
																<option value="3">4</option>
																<option value="4">5</option>
																<option value="5">6</option>
															</select>
														</form>
														<p class="aa-prod-category">
															Category: <a href="#">Polo T-Shirt</a>
														</p>
													</div>
													<div class="aa-prod-view-bottom">
														<a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
														<a href="#" class="aa-add-to-cart-btn">View Details</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- / quick view modal -->
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="aa-banner-area">
						<a href="#">
							<img style="object-fit: cover; object-position: center center;" src="{{asset('front_asset/img/birthday-banner.jpg')}}" width="1170px" height="170px" alt="fashion banner img">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="aa-popular-category-area">
						<!-- start prduct navigation -->
						<ul class="nav nav-tabs aa-products-tab">
							<li class="active"><a href="#trending" data-toggle="tab">Trending</a></li>
							<li><a href="#featured" data-toggle="tab">Featured</a></li>
							<li><a href="#latest" data-toggle="tab">Latest</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<!-- Start men popular category -->
							<div class="tab-pane fade in active" id="trending">
								<ul class="aa-product-catg aa-popular-slider">
									<!-- start single product item -->
									@foreach($trending_products as $val)
										<li>
											<figure>
												<a class="aa-product-img" href="{{url('product/'.$val->slug)}}"><img width="250px" height="300px" src="{{asset('storage/products/'.$val->image)}}" alt="polo shirt img"></a>
												<a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_cart({{$val->id}},'{{$trending_product_attrs[$val->id][0]->size}}','{{$trending_product_attrs[$val->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
												<figcaption>
													<h4 class="aa-product-title"><a href="#">{{$val->title}}</a></h4>
													<span class="aa-product-price">₹ {{$trending_product_attrs[$val->id][0]->price}}</span><span class="aa-product-price"><del>₹ {{$trending_product_attrs[$val->id][0]->mrp}}</del></span>
												</figcaption>
											</figure>
											<div class="aa-product-hvr-content">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
												<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
											</div>
											<!-- product badge -->
											<span class="aa-badge aa-sale" href="#">SALE!</span>
										</li>
									@endforeach
								</ul>
								<div style="text-align: center;">
									<a class="aa-browse-btn" href="#">
										Browse all Product<span class="fa fa-long-arrow-right"></span>
									</a>
								</div>
							</div>

							<!-- start featured product category -->
							<div class="tab-pane fade" id="featured">
								<ul class="aa-product-catg aa-featured-slider">
									@foreach($featured_products as $val)
										<li>
											<figure>
												<a class="aa-product-img" href="#"><img width="250px" height="300px" src="{{asset('storage/products/'.$val->image)}}" alt="polo shirt img"></a>
												<a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_cart({{$val->id}},'{{$featured_product_attrs[$val->id][0]->size}}','{{$featured_product_attrs[$val->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
												<figcaption>
													<h4 class="aa-product-title"><a href="#">{{$val->title}}</a></h4>
													<span class="aa-product-price">₹ {{$featured_product_attrs[$val->id][0]->price}}</span><span class="aa-product-price"><del>₹ {{$featured_product_attrs[$val->id][0]->mrp}}</del></span>
												</figcaption>
											</figure>
											<div class="aa-product-hvr-content">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
												<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
											</div>
											<!-- product badge -->
											<span class="aa-badge aa-sale" href="#">SALE!</span>
										</li>
									@endforeach
								</ul>
								<a class="aa-browse-btn" href="#">Browse all Product
									<span class="fa fa-long-arrow-right"></span>
								</a>
							</div>

							<!-- start latest product category -->
							<div class="tab-pane fade" id="latest">
								<ul class="aa-product-catg aa-latest-slider">
									@foreach($lastest_products as $val)
										<li>
											<figure>
												<a class="aa-product-img" href="#"><img width="250px" height="300px" src="{{asset('storage/products/'.$val->image)}}" alt="polo shirt img"></a>
												<a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
												<figcaption>
													<h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
													<span class="aa-product-price">₹ {{$lastest_product_attrs[$val->id][0]->price}}</span><span class="aa-product-price"><del>₹ {{$lastest_product_attrs[$val->id][0]->mrp}}</del></span>
												</figcaption>
											</figure>
											<div class="aa-product-hvr-content">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
												<a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
											</div>
											<!-- product badge -->
											<span class="aa-badge aa-sale" href="#">SALE!</span>
										</li>
									@endforeach
								</ul>
								<a class="aa-browse-btn" href="#">
									Browse all Product <span class="fa fa-long-arrow-right"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="aa-support">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-support-area">
					<!-- single support -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="aa-support-single">
							<span class="fa fa-truck"></span>
							<h4>FREE SHIPPING</h4>
							<P>Count on a leader in worldwide shipping & a stable partner for global & local businesses.</P>
						</div>
					</div>
					<!-- single support -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="aa-support-single">
							<span class="fa fa-clock-o"></span>
							<h4>7 DAYS MONEY BACK</h4>
							<P>How to politely and quickly respond to customer refund requests? </P>
						</div>
					</div>
					<!-- single support -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="aa-support-single">
							<span class="fa fa-phone"></span>
							<h4>SUPPORT 24/7</h4>
							<P>24/7 customer support means customers can get help & find answers as soon as they come up.</P>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="aa-client-brand">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-client-brand-area">
					<ul class="aa-client-brand-slider">
						@foreach($brand as $val)
						<li><a href="#"><img width="250px" height="40px" src="{{asset('storage/brand/'.$val->brand_image)}}" alt="java img"></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<form id="subForm">
	@csrf
	<input type="hidden" id="siz_id" name="siz_id">
	<input type="hidden" id="col_id" name="col_id">
	<input type="hidden" id="qty" name="qty">
	<input type="hidden" id="pro_id" name="pro_id">
</form>
<!-- / Subscribe section -->
@endsection