@extends('frontend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
@endpush
@section('category_menu')
    @include('frontend.includes.category_menu')
@endsection
@section('content')

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Your Order :</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Product Name</div>
											<div class="cart_item_text">{{ $check->payment_type ?? '' }}</div>
                                        </div>

                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Sub-total</div>
											<div class="cart_item_text">{{ $check->subtotal ?? '' }}</div>
                                        </div>

                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Shipping</div>
											<div class="cart_item_text">{{ $check->shipping ?? '' }}</div>
                                        </div>

                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Vat</div>
											<div class="cart_item_text">{{ $check->vat ?? '' }}</div>
                                        </div>
                                        
                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Paymnet Amount</div>
											<div class="cart_item_text">{{ $check->payment_amount ?? '' }}</div>
                                        </div>

                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Date</div>
											<div class="cart_item_text">{{ $check->date ?? '' }}</div>
										</div>

									</div>
								</li>
                            </ul>
						</div><br><br><br>
						
                        <!-- Order Total -->
                        <div class="cart_title">Your Order Status :</div>
						<div class="order_total">
							<div class="order_total_content text-md-right"><br>
								@if ($check->status == 0)
                                    <div class="progress" style="height: 20px">
                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            Your Order Under Review
                                        </div>
                                    </div>
                                @elseif ($check->status == 1)
                                    <div class="progress" style="height: 20px">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            Paymnet Accept Under Processing ....
                                        </div>
                                    </div>
                                @elseif ($check->status == 2)
                                    <div class="progress" style="height: 20px">
                                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            Packing Done Handover Processing .....
                                        </div>
                                    </div>
                                @elseif ($check->status == 3)
                                    <div class="progress" style="height: 20px">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                           Successfully Delivered Your Order !
                                        </div>
                                    </div>
                                @elseif ($check->status == 4)
                                    <div class="progress" style="height: 20px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            Your Order Had Cancled !
                                        </div>
                                    </div>
                                @endif
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