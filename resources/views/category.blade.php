@extends('layouts.layout-header-and-footer')
@section('content')
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="{{ asset('images/BGImage2.jpg') }}" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3> TV </h3>
				</div>
			</li>
			<li>
				<img src="{{ asset('images/BGImage1.png') }}" alt="" />
				  <div class="slide-desc">
					<h3>Smart Phone + Laptop</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2> Danh Mục Sản Phẩm </h2> 
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">SẢN PHẨM MỚI</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">SẢN PHẨM GIẢM GIÁ</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>TOP SẢN PHẨM MỚI</h5>
								<p class="w3l-ad">Các Thương Hiệu Lớn Đến Từ Samsung, LG, Sony.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($p as $item)
									

									
									<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="{{ asset('images/offer.png') }}" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{ url('product/'.$item->id) }}"><img width="200px" height="200px" title=" " alt=" " src="{{ asset('uploads/product/'.$item->thumbnail) }}" height="'100" width="100" /></a>		
															<p>{{ $item->name }}</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4>{{ $item->price - $item->discount }} đ<span>{{ $item->price }} đ</span></h4> <br>
															<h4 style="color: red" > <i> Tiết Kiệm {{ $item->discount}} đ</i></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<!--<form action="{{ url('themgiohang/'.$item->id) }}" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />
																</fieldset>
															</form>-->
															<a href="javascript:;" onclick="alertCart({{ $item->id }})" class="btn btn-success">Thêm vào giỏ hàng</a>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								
								@endforeach
								
								
								<div class="clearfix"> </div>
							</div>
							
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>TOP SẢN PHẨM ĐANG GIẢM GIÁ MẠNH</h5>
								<p class="w3l-ad">Các Thương Hiệu Lớn Đến Từ Samsung, LG, Sony.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($p as $item) 
									@if($item->discount >0)
									<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="{{ asset('images/offer.png') }}" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{ url('product/'.$item->id) }}"><img width="200px" height="200px" title=" " alt=" " src="{{ asset('uploads/product'.$item->thumbnail) }}" height="'100" width="100" /></a>		
															<p>{{ $item->name }}</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4>{{ $item->price - $item->discount }} đ<span>{{ $item->price }} đ</span></h4>
															<br>
															<h4 style="color: red" > <i> Tiết Kiệm {{ $item->discount}} đ</i></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<!--<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button" />
																</fieldset>
															</form>-->
															<a href="{{ url('themgiohang/'.$item->id) }}" name="submit" value="" class="btn btn-success" >Thêm Vào Giỏ Hàng</a>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
								
								
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


