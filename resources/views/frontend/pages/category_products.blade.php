@extends('frontend.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">
@endpush

@section('content')
    	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll"><img src="{{ asset('frontend/images/shop_background.jpg') }}"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{ $catname }}</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Sub Categories</div>
							<ul class="sidebar_categories">
                                @foreach($subcategoryproducts as $row)
                                    <li><a href="{{ url('/product/subcategory/'.$row->subcategory_id.'/'.$row->subcategory->subcategory_name) }}">{{ $row->subcategory->subcategory_name }}</a></li>
                                @endforeach
							</ul>
                        </div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach($brands as $row)
									<li class="brand"><a href="#">{{ $row->brand->brand_name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count">
								<span>{{ $categoryProducts->count() }}</span>  Products found
							</div>
						</div>
						<div class="product_grid">
							<div class="product_grid_border"></div>

                            <!-- Product Item -->
                            @foreach ($categoryProducts as $item)
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('backend/media/product/'. $item->image_one) }}" alt="Product image" style="height: 120px; width: 100px;">
                                    </div>
                                    <div class="product_content">
                                        <div class="product_price">
											@if ($item->discount_price == Null)
                                                <div class="product_price">${{ $item->selling_price }}</div>
                                            @else
                                                <div class="product_price"> ${{ $item->discount_price }} <span>${{ $item->selling_price }}</span></div>
                                            @endif
										</div>
                                        <div class="product_name">
											<div>
												<a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}" tabindex="0">{{ $item->product_name }}</a>
											</div>
										</div>
                                    </div>
								<!--Wishlist Section -->
									<button id="wishlist" data-id="{{ $item->id }}">
										<div class="product_fav">
											<i class="fas fa-heart">
											</i>
										</div>
									</button>
								<!--End Wishlist Section -->
									<ul class="product_marks">
										@if ($item->discount_price == Null)
											<li class="product_mark product_new">New</li>
										@else
											@php
												$amount = $item->selling_price - $item->discount_price;
												$discount = $amount / $item->selling_price * 100;
											@endphp
											<li class="product_mark product_new" style="background: red;">
												{{ intval($discount) }}%
											</li>
										@endif
									</ul>
                                </div>
                            @endforeach
						</div>

					<!-- Shop Page Navigation -->

					<div class="shop_page_nav d-flex flex-row">
						{{ $categoryProducts->links() }}
					</div>	
				</div>
			</div>
		</div>
    </div>

@include('frontend.model.product_cart_modal')

@endsection

@push('js')
    <script src="{{ asset('frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
	<script src="{{ asset('frontend/js/shop_custom.js') }}"></script>
@endpush