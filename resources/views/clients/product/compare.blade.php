@extends('layouts.layout-header-and-footer')
@section('head-product-detail')
<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
<link href="{{ asset('css/styleCompare.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('js/Compare.js') }}"></script>
@endsection
@section('content')
<div class="w3-container">
        <div class="w3-row-padding">
        	@foreach($_SESSION['compare'] as $key => $value)
				@foreach($product as $item)
					<?php $description = $item->description; 
        				$array = json_decode($description,true);
        			?>
					@if($value == $item->id)
		            <div class="w3-col l3 m6  relPos w3-center " style="height: 300px">
		            	@if($item->category_id == 1)
		                	<div class="selectProduct w3-padding" data-image="{{ asset('uploads/product/'.$item->thumbnail) }}" data-id="{{ $item->name }}"  data-title="{{ $item->name }}" data-cate="1" data-loai="{{ $array['Loại'] }}" data-dophangiai="{{ $array['Độ phân giải']}}" data-hedieuhanh="{{ $array['Hệ điều hành'] }}" data-manhinh="{{ $array['Màn hình']}}" data-xuatxu="{{ $array['Xuất xứ'] }}">
						@elseif($item->category_id == 2)
							<div class="selectProduct w3-padding" data-image="{{ asset('uploads/product/'.$item->thumbnail) }}" data-id="{{ $item->name }}" data-title="{{ $item->name }}" data-cate="2" data-loai="{{ $array['Loại'] }}" data-cpu="{{ $array['CPU'] }}" data-hedieuhanh="{{ $array['Hệ điều hành'] }}" data-manhinh="{{ $array['Màn hình'] }}" data-xuatxu="{{ $array['Xuất xứ'] }}">
						@else
							<div class="selectProduct w3-padding" data-image="{{ asset('uploads/product/'.$item->thumbnail) }}" data-id="{{ $item->name }}"  data-title="{{ $item->name }}" data-cate="3"
							data-loai="{{ $array['Loại'] }}" data-cpu="{{ $array['CPU'] }}" data-hedieuhanh="{{ $array['Hệ điều hành'] }}" data-manhinh="{{ $array['Màn hình'] }}" data-xuatxu="{{ $array['Xuất xứ'] }}" >
						@endif
		                    <a class="w3-btn-floating w3-light-grey addButtonCircular addToCompare">+</a>
		                    <img height="150px" src="{{ url('uploads/product/'.$item->thumbnail) }}" class="imgFill productImg">
		                    <h4>{{ $item->name }}</h4>
		                </div>
		            </div>
		            @endif
				@endforeach
			@endforeach
        </div>
    </div>
	<div class="w3-container  w3-center">
        <div class="w3-row w3-card-4 w3-grey w3-round-large w3-border comparePanle w3-margin-top">
            <div class="w3-row">
                <div class="w3-col l9 m8 s6 w3-margin-top">
                    <h4>Add Compare</h4>
                </div>
                <div class="w3-col l3 m4 s6 w3-margin-top">
                    &nbsp;
                    <button class="w3-btn w3-round-small w3-white w3-border notActive cmprBtn" disabled>Compare</button>
                </div>
            </div>
            <div class=" titleMargin w3-container comparePan">
            </div>
        </div>
    </div>
    <!--end of preview panel-->
    
    <!-- comparision popup-->
    <div id="id01" class="w3-animate-zoom w3-white w3-modal modPos">
        <div class="w3-container">
            <a onclick="document.getElementById('id01').style.display='none'" class="whiteFont w3-padding w3-closebtn closeBtn">&times;</a>
        </div>
        <div class="w3-row contentPop w3-margin-top">
        </div>

    </div>
    <!--end of comparision popup-->

    <!--  warning model  -->
    <div id="WarningModal" class="w3-modal">
        <div class="w3-modal-content warningModal">
            <header class="w3-container w3-teal">
                <h3><span>&#x26a0;</span>Error</h3>
            </header>
            <div class="w3-container">
                <h4>Maximum of Three products are allowed for comparision</h4>

            </div>
            <footer class="w3-container w3-right-align">
                <button id="warningModalClose" onclick="document.getElementById('id01').style.display='none'" class="w3-btn w3-hexagonBlue w3-margin-bottom  ">Ok</button>
            </footer>
        </div>
    </div>
@endsection