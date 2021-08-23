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
						<div class="cart_title">All Wishlist Product</div>
						<div class="cart_items">
                            @foreach ($wishlist as $item)
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image">
                                        <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                    @else {{ asset('frontend/images/41r9I3xo1YL.jpg') }} @endif" alt="" style="height: 120px;">
                                    </div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Product Name</div>
                                            <div class="cart_item_text">
                                                <a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">{{ $item->product_name }}</a>
                                            </div>
                                        </div>
                                        @if ($item->product_colour)
                                        @else
                                        <div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $item->product_colour }}</div>
                                        </div>
                                        @endif
										
                                        @if($item->product_size == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $item->product_size }}</div>
										</div>
										@endif
										<div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
											@if ($item->discount_price == Null)
                                                <div class="cart_item_text">${{ $item->selling_price }}</div>
                                            @else
                                                <div class="cart_item_text">${{ $item->discount_price }}</div>
                                            @endif
										</div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_text">
                                                <button id="{{ $item->id }}" class="addcart btn btn-danger"  data-toggle="modal" 
                                                    data-target="#cartmodal" onclick="productview(this.id)">Add To Cart</button>
												
													<button type="button" class="btn btn-sm btn-danger" title="Delete">
														<i onclick="deleteItem({{ $item->id }})" class="fa fa-trash"></i>
													</button>
													<form id="delete_form_{{ $item->id }}" method="POST" action="{{ route('user.wishlist.destroy', $item->id) }}">
														@csrf
														@method('DELETE')
													</form>
                                            </div>
										</div>
									</div>
								</li>
                            </ul>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    @include('frontend.model.product_cart_modal')

@endsection
@push('js')
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
	<script type="text/javascript">
		function deleteItem(id){
		  const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'mr-2 btn btn-danger'
			  },
			  buttonsStyling: false,
			})
			swalWithBootstrapButtons.fire({
				title: 'Are you sure?',
				text: "You Want to Delete This!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				reverseButtons: true
			  }).then((result) => {
				  if (result.value) {
					  event.preventDefault();
					  document.getElementById('delete_form_'+id).submit();
					} else if (
							// Read more about handling dismissals
							result.dismiss === Swal.DismissReason.cancel
						) {
							swalWithBootstrapButtons.fire(
								'Cancelled',
								'Your Data is Save :)',
								'error'
							)
						}
				})
		}
	  </script>
	  
@endpush