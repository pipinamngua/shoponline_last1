@extends('layouts.layout-header-and-footer')
@section('head-product-detail')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('product_detail/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="{{ asset('product_detail/js/jquery-1.7.2.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('product_detail/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('product_detail/js/easing.js') }}"></script>
<script src="{{ asset('product_detail/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
<link href="{{ asset('product_detail/css/easy-responsive-tabs.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="{{ asset('product_detail/css/global.css') }}">
<script src="{{ asset('product_detail/js/slides.min.jquery.js') }}"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
@endsection
@section('content')
  <div class="wrap">
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container">
									@if(count($product->image) != 0)
										@foreach($product->image as $item)
											<a href="{{ asset('uploads/product/'.$item->name) }}" target="_blank"><img src="{{ asset('uploads/product/'.$item->name) }}" alt=" " /></a>
										@endforeach
									@else
										<a href="#" target="_blank"><img src="{{ asset('uploads/no-image.jpg') }}" alt=" " /></a>
									@endif
									
								</div>
								<ul class="pagination">
									
									@if(count($product->image) !=0)
										@foreach($product->image as $item)
											<li><a href="{{ asset('uploads/product/'.$item->name) }}"><img src="{{ asset('uploads/product/'.$item->name) }}" alt=" " /></a></li>
										@endforeach
									@else
											<li><a href="#"><img src="{{ asset('product_detail/images/no-image.jpg') }}" alt=" " /></a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2>{{ $product->name }}</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>Price: <span>{{ number_format($product->price,0,",",".") }} VNĐ</span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					<ul>
						<li>Color:
							<select>
							<option>Silver</option>
							<option>Black</option>
							<option>Dark Black</option>
							<option>Red</option>
						</select></li>
						<li>Size:<select>
							<option>Large</option>
							<option>Medium</option>
							<option>small</option>
							<option>Large</option>
							<option>small</option>
						</select></li>
						<li>Quality:<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select></li>
					</ul>
					</div>
				<div class="share-desc">
					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img src="{{ asset('product_detail/images/facebook.png') }}" alt="" /></a></li>
					    	<li><a href="#"><img src="{{ asset('product_detail/images/twitter.png') }}" alt="" /></a></li>					    
			    		</ul>
					</div>
					<div class="button"><span><a href="{{ url('themgiohang/'.$product->id) }}" name="submit" value="" class="btn btn-success" >Thêm Vào Giỏ Hàng</a></span></div>					
					<div class="clear"></div>
				</div>
				 <div class="wish-list">
				 	<ul>
				 		<li class="wish"><a href="#">Add to Wishlist</a></li>
				 	    <li class="compare">
					 	    {!! Form::open(['method' => 'POST', 'url' => 'compare/'.$product->id]) !!}
											{!! Form::submit('Add to compare') !!}
							{!! Form::close() !!}
						</li>
				 	</ul>
				 </div>
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li>Product Details</li>
					<li>product Tags</li>
					<li>Product Reviews</li>
					<div class="clear"></div>
				</ul>
				<div class="resp-tabs-container">
					<?php 
						$p = json_decode($product->description,true);

					?>
					@if($product->category_id == 1)
						<div class="product-desc">
							<h4>CHI TIẾT SẢN PHẨM</h4>
							 <ul>
							 	<li>Loại : {{ $p['Loại'] }}</li>
							 	<li>Độ Phân Giải : {{ $p['Độ phân giải'] }}</li>
							 	<li>Hệ Điều Hành : {{ $p['Hệ điều hành']}}</li>
							 	<li>Màn Hình : {{ $p['Màn hình'] }}</li>
							 	<li>Xuất xứ : {{ $p['Xuất xứ'] }}</li>
							 	
							 </ul>
						</div>
					@elseif($product->category_id == 2)
						<div class="product-desc">
							<h4>CHI TIẾT SẢN PHẨM</h4>
							 <ul>
							 	<li>Loại : {{ $p['Loại'] }}</li>
							 	<li>CPU : {{ $p['CPU'] }}</li>
							 	<li>Hệ Điều Hành : {{ $p['Hệ điều hành']}}</li>
							 	<li>Màn Hình : {{ $p['Màn hình'] }}</li>
							 	<li>Xuất xứ : {{ $p['Xuất xứ'] }}</li>
							 	
							 </ul>
						</div>
					@elseif($product->category_id == 3)
						<div class="product-desc">
							<h4>CHI TIẾT SẢN PHẨM</h4>
							 <ul>
							 	<li>Loại : {{ $p['Loại'] }}</li>
							 	<li>CPU : {{ $p['CPU'] }}</li>
							 	<li>Ổ cứng : {{ $p['Ổ cứng'] }}</li>
							 	<li>Màn Hình : {{ $p['Màn hình'] }}</li>
							 	<li>Xuất xứ : {{ $p['Xuất xứ'] }}</li>
							 	
							 </ul>
						</div>
					@endif
					

				 <div class="product-tags">
						 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					<h4>Add Your Tags:</h4>
					<div class="input-box">
						<input type="text" value="">
					</div>
					<div class="button"><span><a href="#">Add Tags</a></span></div>
			    </div>	

				<div class="review">
					@guest
						<p align="center">You have to <a href="{{ route('login')}}">Login</a></p>
					@else
						@if(Session::has('sucess'))
                            <div class="alert alert-success">
                                <i><p>{{ Session::get('sucess')}}</p></i>
                            </div>
                            @endif
						{!! Form::open(['method' =>'POST','url'=>'product/review/'.$product->id.'/'.Auth::user()->id]) !!}
							{!! Form::text('name', Auth::check() ? Auth::user()->name:null,['class' => 'form-control','placeholder'=>'Your name ...','required'=>'true']) !!}
							<br>
							{!! Form::text('email',Auth::check() ? Auth::user()->email:null,['class' => 'form-control','placeholder'=>'Your email ...','required'=>'true']) !!}
							<br>
							{!! Form::text('content','',['class' => 'form-control','placeholder'=>'Your content ...','required'=>'true']) !!}
							{!! Form::submit('Submit') !!}
						{!! Form::close() !!}
					@endguest
					@foreach($review as $key => $value)
								<div id="review">
									<div style="width: 10%;float: left;">
										<img src="{{ url('uploads/product/no-image.jpg') }}" width="50px">
										@if($value->user['group_id'] == 1)
										<h3 class="fa fa-star"> {{ $value->user['name'] }}</h3>
										@else
										<h3>{{ $value->user['name'] }}</h3>
										@endif
									</div>
									<div style="width: 70%">
										<h3 style="color: #299DDF">{{ $value->email }}</h3>
										<br>
										<h5>{{ $value->content }}</h5>
										<h6 style="float: right;">Updated at : {{ $value->updated_at }}</h6>
									</div>
									<div class="clear"></div>
									<hr>
								</div>
					@endforeach
				</div>
			</div>
		 </div>
	 </div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>	  
        </div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						@foreach($cate as $item)
				      <li><a href="{{ url('Category/'.$item->id) }}">{{ $item->name }}</a></li>
				     	@endforeach
    				</ul>
    				<div class="section group">
					<br>
					<h2>You may like</h2>
					@foreach($prdSuggestByOrder as $value)
					<ul>
						<li>
							<a href="{{ url('product/'.$value->id) }}">
								<img src="{{ asset('uploads/product/'.$value->thumbnail) }}" width="250px">
								<h5 style="color: #090205;margin-left: 20px">{{ $value->name }}</h5>
							</a>
						</li>
					</ul>
					@endforeach
				</div>
 				</div>
 		</div>
 	</div>
    </div>
 </div>
 <!-- suggest product -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>SUGGEST PRODUCT</h3>
				<div class="agile_top_brands_grids">
					@foreach($suggest_product as $item)
						<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="{{ asset('images/offer.png') }}" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{ url('product/'.$item->product->id) }}"><img title=" " alt=" " src="{{ asset('uploads/product/'.$item->product->thumbnail) }}" height="100" width="100"></a>		
												<p>{{ $item->product->name }}</p>
												<div class="stars">
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star gray-star" aria-hidden="true"></i>
												</div>
													@if($item->discount != 0)
														<h4>{{ number_format($item->product->price*(100 - $item->discount)/100,0,",",".") }} VNĐ<span>{{number_format($item->product->price,0,",",".") }}</span></h4>
													@else
														<h4>{{ number_format($item->product->price,0,",",".") }} VNĐ</h4>
													@endif
													
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
	</div>
<!-- //suggest product -->
<!-- related to this product -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>RELATED TO THIS PRODUCT</h3>
				<div class="agile_top_brands_grids">
					@foreach($productByTagName as $item)
						<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="{{ asset('images/offer.png') }}" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{ url('product/'.$item->id) }}"><img title=" " alt=" " src="{{ asset('uploads/product/'.$item->thumbnail) }}" height="100" width="100"></a>		
												<p>{{ $item->name }}</p>
												<div class="stars">
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star gray-star" aria-hidden="true"></i>
												</div>
													@if($item->discount != 0)
														<h4>{{ number_format($item->price*(100 - $item->discount)/100,0,",",".") }} VNĐ<span>{{number_format($item->price,0,",",".") }}</span></h4>
													@else
														<h4>{{ number_format($item->price,0,",",".") }} VNĐ</h4>
													@endif
													
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
	</div>
<!-- //related to this product -->
@endsection