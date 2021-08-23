@php
    $Setting = App\model\admin\Setting::select('logo','shop_name')->first();
@endphp

<div class="header_main">
    <div class="container">
        <div class="row">


            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="{{ url('/') }}"></a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="{{ route('product.search.result') }}" method="POST" class="header_search_form clearfix">
                                @csrf
                                <input type="search" required="required" class="header_search_input" placeholder="Search for products..." onkeyup="productSearch(this)" name="search">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">Toutes Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="#">All Categories</a></li>
                                            @foreach ($categories as $key => $row)
                                                <li><a class="clc" href="#">{{ $row->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('frontend/images/search.png') }}" alt=""></button>
                            </form>

                            <div style="background: #fff; display: none; max-height: 400px; overflow-y: scroll; margin-top: 5px; padding: 1rem 0;" id="show_post"></div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        @guest
                        @else
                        @php
                            $userid = Auth::id();
                            $wishlist = DB::table('wishlists')->where('user_id', $userid)->get();
                        @endphp
                            <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="{{ route('user.wishlist') }}">liste</a></div>
                                <div class="wishlist_count">{{ count($wishlist) }}</div>
                            </div>
                        @endguest
                    </div>


                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                            </div>
                            <div class="cart_content">
                                <div class="cart_text"><a href="{{ route('cart.product.list') }}">Panier</a></div>
                                <div class="cart_price">${{ Cart::subtotal() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
