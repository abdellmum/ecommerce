@extends('frontend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
	<style type="text/css">
		/**
		 * The CSS shown here will not be introduced in the Quickstart guide, but shows
		 * how you can use CSS to style your Element's container.
		 */
		.StripeElement {
		  box-sizing: border-box;
	
		  height: 40px;
		  width: 100%;
	
		  padding: 10px 12px;
	
		  border: 1px solid transparent;
		  border-radius: 4px;
		  background-color: white;
	
		  box-shadow: 0 1px 3px 0 #e6ebf1;
		  -webkit-transition: box-shadow 150ms ease;
		  transition: box-shadow 150ms ease;
		}
	
		.StripeElement--focus {
		  box-shadow: 0 1px 3px 0 #cfd7df;
		}
	
		.StripeElement--invalid {
		  border-color: #fa755a;
		}
	
		.StripeElement--webkit-autofill {
		  background-color: #fefde5 !important;
		}
	</style>
@endpush
<script src="https://js.stripe.com/v3/"></script>


@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
				<div class="col-lg-7" style="border-right: 1px solid grey; padding: 20px;">
					<div class="cart_container">
						<div class="cart_title text-center">Product Informatin</div>
						<div class="cart_items">
							<ul class="cart_list">
								@foreach($cartList as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image" style="width: 100px; height: 100px;"><img src="{{ asset('backend/media/product/'.$row->options->image) }}" alt="Bye Product" style="height: 107px;"></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_text">{{ $row->name }}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_text">{{ $row->qty }}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_text">${{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_text">${{ $row->price*$row->qty }}</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
				
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_total cart_info_col">
										<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
											<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Total Order :</div>
											<span class="cart_item_text">$ {{ Cart::Subtotal() }}</span>
										</div>

										<!-- Coupon -->

										<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
											@if(Session::has('coupon'))
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Coupon : ({{   Session::get('coupon')['name'] }})</div>
												<span class="cart_item_text">$  {{ Session::get('coupon')['amount'] }}</span>
											@endif
										</div>

										<!-- Shipping Charge -->
				
										@php
											$shipping = App\model\admin\Setting::first();
											$charge = $shipping->shipping_charge;
											$coupon = Session::get('coupon')['amount'];
				
											$str = Cart::Subtotal();
											$cartTotal = str_replace( ',', '', $str);
										@endphp
				
										@if (Session::has('coupon'))
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Shipping Charge :  </div>
												<span class="cart_item_text">$ {{ $coupon/100 * $charge }}</span>
											</div>
										@else
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Shipping Charge :  </div>
												<span class="cart_item_text">$ {{ $cartTotal/100 * $charge }}</span>
											</div>
										@endif

										<!-- VAT -->
				
										@php
											$vatId = App\model\admin\Setting::first();
											$vat = $vatId->vat;
										@endphp
				
										@if (Session::has('coupon'))
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">VAT :  </div>
												<span class="cart_item_text">$ {{ $coupon/100 * $vat }}</span>
											</div>
										@else
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">VAT :  </div>
												<span class="cart_item_text">$ {{ $cartTotal/100 * $vat }}</span>
											</div>
										@endif
										
										<!-- Total Amount -->
				
										@if (Session::has('coupon'))
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Total Amount :  </div>
												<span class="cart_item_text">$ {{ $coupon + $coupon/100 * $charge  + $coupon/100 * $vat}}</span>
											</div>
										@else
											<div class="cart_item_name cart_info_col" style="margin: 0 auto; overflow: hidden; padding-top: 15px;">
												<div class="cart_item_title" style="float: left; font-weight: 500; color: rgb(0 0 0 / 68%); font-size: 17px;">Total Amount :  </div>
												<span class="cart_item_text">$ {{ $cartTotal + $cartTotal/100 * $charge +$cartTotal/100 * $vat}}</span>
											</div>
										@endif
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div><!--- end row colum 7 -->

                <div class="col-lg-5" style=" padding: 20px;">
					<div class="cart_container">
						<div class="cart_title text-center">Pay Now</div><br><br>
						<form action="{{ route('stripe.charge') }}" method="post" id="payment-form" style="border: 1px solid grey; padding: 20px;">
                        	@csrf
                          <div class="form-row">
                            <label for="card-element">
                              Credit or debit card
                            </label>
                            <div id="card-element">
                              <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
							<div id="card-errors" role="alert"></div>

							<input type="hidden" value="{{ Cart::Subtotal() }}" name="sub_total">
							<!-- Shipping Charge -->
							@if (Session::has('coupon'))
								<input type="hidden" value="{{ $coupon/100 * $charge }}" name="shipping_charge">
							@else
								<input type="hidden" value="{{ $cartTotal/100 * $charge }}" name="shipping_charge">
							@endif

							<!-- Vat -->
							@if (Session::has('coupon'))
								<input type="hidden" value="{{ $coupon/100 * $vat }}" name="vat">
							@else
								<input type="hidden" value="{{ $cartTotal/100 * $vat }}" name="vat">
							@endif

							<!-- Total -->
							@if (Session::has('coupon'))
								<input type="hidden" value="{{ $coupon + $coupon/100 * $charge  + $coupon/100 * $vat}}" name="total">
							@else
								<input type="hidden" value="{{ $cartTotal + $cartTotal/100 * $charge +$cartTotal/100 * $vat}}" name="total">
							@endif

							<!-- Shipping Info -->
							<input type="hidden" value="{{ $payment['name'] }}" name="ship_name">
							<input type="hidden" value="{{ $payment['email'] }}" name="ship_email">
							<input type="hidden" value="{{ $payment['phone_number'] }}" name="ship_phone">
							<input type="hidden" value="{{ $payment['address'] }}" name="ship_address">
							<input type="hidden" value="{{ $payment['city'] }}" name="ship_city">
							<input type="hidden" value="{{ $payment['post_code'] }}" name="ship_post_code">
							<input type="hidden" value="{{ $payment['payment'] }}" name="payment_type">

						  </div><br><br>
						  <button class="btn btn-info">Pay Now</button>
                        </form>
					</div>
                </div><!-- end rwo colum 5 -->
            </div>
        </div>

    </div>

@endsection

@push('js')
	<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
	<script type="text/javascript">
	
	// Create a Stripe client.
	var stripe = Stripe('pk_test_51I8oIQKVek47RdpXq3r97iLv1TuPe2EGTq89rqOgrtqQabpUEdDqnjFalxlsvWngymaZF8R8g6iy9dayLdFFTAIn00uARl4sBP');

	// Create an instance of Elements.
	var elements = stripe.elements();
	
	// Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
	  base: {
		color: '#32325d',
		fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		fontSmoothing: 'antialiased',
		fontSize: '16px',
		'::placeholder': {
		  color: '#aab7c4'
		}
	  },
	  invalid: {
		color: '#fa755a',
		iconColor: '#fa755a'
	  }
	};
	
	// Create an instance of the card Element.
	var card = elements.create('card', {style: style});
	
	// Add an instance of the card Element into the `card-element` <div>.
	card.mount('#card-element');
	
	// Handle real-time validation errors from the card Element.
	card.addEventListener('change', function(event) {
	  var displayError = document.getElementById('card-errors');
	  if (event.error) {
		displayError.textContent = event.error.message;
	  } else {
		displayError.textContent = '';
	  }
	});
	
	// Handle form submission.
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	  event.preventDefault();
	
	  stripe.createToken(card).then(function(result) {
		if (result.error) {
		  // Inform the user if there was an error.
		  var errorElement = document.getElementById('card-errors');
		  errorElement.textContent = result.error.message;
		} else {
		  // Send the token to your server.
		  stripeTokenHandler(result.token);
		}
	  });
	});
	
	// Submit the form with the token ID.
	function stripeTokenHandler(token) {
	  // Insert the token ID into the form so it gets submitted to the server
	  var form = document.getElementById('payment-form');
	  var hiddenInput = document.createElement('input');
	  hiddenInput.setAttribute('type', 'hidden');
	  hiddenInput.setAttribute('name', 'stripeToken');
	  hiddenInput.setAttribute('value', token.id);
	  form.appendChild(hiddenInput);
	
	  // Submit the form
	  form.submit();
	}
	</script>
@endpush