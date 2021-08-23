@extends('frontend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
@endpush

@section('content')

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Checkout</div>
						<div class="cart_items">

							<ul class="cart_list">
							@foreach($cart as $item)
								<li class="cart_item clearfix">
									<div class="cart_item_image">
										<img src="{{ asset('backend/media/product/'.$item->options->image) ?? ''}}" alt="Cart Image" style="height: 120px;">
									</div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>

										@if($item->options->color == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">
													{{ $item->options->color }}
											</div>
										</div>
										@endif

										@if($item->options->size == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">
													{{ $item->options->size }}
											</div>
										</div>
										@endif
										
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title mt-3">Quantity</div>
											<br>
											<form method="POST" action="{{ route('cart.product.update', $item->rowId) }}">
												@csrf
												<input name="qty" style="width: 50px; height:30px;" type="number" value="{{ $item->qty }}">
												<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></button>
											</form>
										</div>

										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>

										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{ $item->price * $item->qty }}</div>
										</div>

										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div><br><br>
											<div class=""><a href="{{ route('cart.product.remove', $item->rowId) }}"><i class="fas fa-trash-alt" title="Delete" style="color: red; font-size: 20px;"></i></a></div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>

							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_total cart_info_col">
										<li class="list-group-item">
											<span class="cart_item_text">Order Total :  </span>
											<span style="float: right; margin-right: 10%;">$ {{ Cart::Subtotal() }}</span> 
										</li>

										@if (Session::has('coupon'))
											<li class="list-group-item">
												<span class="cart_item_text">Coupon :  ({{   Session::get('coupon')['name'] }})</span> <a href="{{ route('user.coupons.remove') }}" class="btn btn-danger btn-sm" title="Remove Coupon">x</a>
												<span style="float: right; margin-right: 10%;">$ {{ Session::get('coupon')['amount'] }}</span> 
											</li>
										@else
										<li class="list-group-item" style="padding-bottom: 38px;">
											<div class="col-lg-4" style="float: left;"><span class="cart_item_text">Apply Coupon :  </span></div>
											<form action="{{ route('apply.coupon') }}" method="post">
												@csrf
													<div class="col-lg-4" style="float: left; margin-top: -6px;">
														<input type="text" class="form-control" name="coupon" required=""  aria-describedby="emailHelp" placeholder="Coupon Code">
													</div>
													<div class="col-lg-4" style="float: left; margin-top: -6px; padding-left: 17%;">
														<button type="submit" class="btn btn-danger">submit</button>
													</div>
											</form>
										</li>	
										@endif

										<!-- Shipping Charge -->

										@php
											$shipping = App\model\admin\Setting::first();
											$charge = $shipping->shipping_charge;
											$coupon = Session::get('coupon')['amount'];

											$str = Cart::Subtotal();
											$cartTotal = str_replace( ',', '', $str);
										@endphp

										@if (session::has('coupon'))
											<li class="list-group-item">
												<span class="cart_item_text">Shipping Charge :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $coupon/100 * $charge }}</span>
											</li>
										@else
											<li class="list-group-item">
												<span class="cart_item_text">Shipping Charge :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $cartTotal/100 * $charge }}</span>
											</li>
										@endif

										<!-- VAT -->

										@php
											$vatId = App\model\admin\Setting::first();
											$vat = $vatId->vat;
										@endphp

										@if (session::has('coupon'))
											<li class="list-group-item">
												<span class="cart_item_text">VAT :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $coupon/100 * $vat }}</span>
											</li>
										@else
											<li class="list-group-item">
												<span class="cart_item_text">VAT :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $cartTotal/100 * $vat }}</span>
											</li>
										@endif
										
										<!-- Total Amount -->

										@if (session::has('coupon'))
											<li class="list-group-item">
												<span class="cart_item_text">Total Amount :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $coupon + $coupon/100 * $charge  + $coupon/100 * $vat}}</span>
											</li>
										@else
											<li class="list-group-item">
												<span class="cart_item_text">Total Amount :  </span>
												<span style="float: right; margin-right: 10%;">$ {{ $cartTotal + $cartTotal/100 * $charge +$cartTotal/100 * $vat}}</span>
											</li>
										@endif
									</div>
								</li>
							</ul>
							<div class="cart_buttons">
								<a href="{{ route('cart.product.list') }}" type="button" class="button cart_button_clear">Back</button>
								<a href="{{ route('payment.page') }}" type="button" class="button cart_button_checkout">Final Step</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
@push('js')
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endpush