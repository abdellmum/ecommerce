@extends('frontend.app')
@section('category_menu')
    @include('frontend.includes.category_menu')
@endsection
@section('content')
@push('css')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=601cd94a9afb3500116211d7&product=inline-share-buttons" async="async"></script>
@endpush

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset('backend/media/product/' .$product->image_one) }}"><img src="{{ asset('backend/media/product/' .$product->image_one) }}" alt=""></li>

						<li data-image="{{ asset('backend/media/product/' .$product->image_two) }}">
							<img src="@if(isset($product->image_two)){{ asset('backend/media/product/' .$product->image_two) }} 
								@else{{ asset('frontend/img/image_not_available_icon.png') }} @endif" alt="Product Image">
						</li>
						<li data-image="{{ asset('backend/media/product/' .$product->image_three) }}">
							<img src="@if(isset($product->image_three)){{ asset('backend/media/product/' .$product->image_three) }} 
								@else{{ asset('frontend/img/image_not_available_icon.png') }} @endif" alt="Product Image">
						</li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('backend/media/product/' .$product->image_one) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->category_name }}  >  {{ $product->subcategory->subcategory_name }}</div>
						<div class="product_name">{{ $product->product_name }}</div>
						{{-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
						<div class="product_text"><p>
							{{-- {!! Illuminate\Support\Str::limit($product->product_details, 20) !!} --}}
							Product Code :  {{ $product->product_code }}
						</p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{ route('add.to.cart') }}" method="POST">
								@csrf
								<div class="row" style="z-index: 1000;">

									<!-- Product Color -->
								   @if($product->product_colour == NULL)
								   @else
										<div class="col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Color</label>
												<select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
													@foreach($product_color as $color)
														<option value="{{ $color }}">{{ $color }}</option>
													@endforeach
												</select>
											</div>
										</div>
								   	@endif
								   
								   <!-- Product Size -->
								   @if($product->product_size == NULL)
								   @else
									<div class="col-lg-4">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Size</label>
											<select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
												@foreach($product_size as $size)
													<option value="{{ $size }}">{{ $size }}</option>
												@endforeach
											</select>
										</div>
								   </div>
								   @endif

								   <!-- Product Quantity -->
								   	<div class="col-lg-4">
										<div class="form-group">
									  		<label for="exampleFormControlSelect1">Quantity</label>
										   	<input class="form-control" type="number" pattern="[0-9]*" value="1" name="qty">
										</div>
								   	</div>
								</div>
									@if($product->discount_price == NULL)
										<div class="product_price text-danger"> Price : $ {{ $product->selling_price }}</div>
									@else
										<div class="product_price text-danger">Price: $ {{ $product->discount_price }}</div>
									@endif
									<input type="hidden" name="product_id" value="{{ $product->id }}">
									<div class="button_container">
										<button type="submit" class="button cart_button">Add to Cart</button>
									{{-- <div class="product_fav"><i class="fas fa-heart"></i></div><br><br> --}}
								</div><br><br>
								<div class="sharethis-inline-share-buttons" style="float: left;"></div>
							</form>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--- Product Details Tav ---->

	<div class="product-details" style="background: #eff6fa; padding-top: 20px;">
		<div class="container">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
				  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Details</a>
				  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews Or Commnet</a>
				  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Video Or Link</a>
				</div>
			</nav><br>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{!! $product->product_details !!}</div>
				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<div class="card-body">
						<h5>Display Comments</h5>
					
						@include('frontend.pages.comment.replys', ['comments' => $product->comments, 'product_id' => $product->id])
		
						<hr />
					</div>
					@if (Auth::check())
						<div class="card-body">
							<h5>Leave a comment</h5>
							<form method="post" action="{{ route('comment.add') }}">
								@csrf
								
								<div class="form-group">
									<input type="text" name="comment" class="form-control" />
									<input type="hidden" name="product_id" value="{{ $product->id }}" />
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 1.0em;" value="Add Comment"/>
								</div>
							</form>
						</div>
					@else
						<div class="card-body">
							<a href="{{ route('login') }}"><h4>Al First Login Your account</h4></a>
						</div>
					@endif
				</div>
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">{!! $product->video_link !!}</div>
			</div><br>
		</div>
	</div>

@endsection

@push('js')
	<script src="{{ asset('frontend/js/product_custom.js') }}"></script>
@endpush