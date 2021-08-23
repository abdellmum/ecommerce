@extends('frontend.app')

@section('category_menu')
    @include('frontend.includes.category_menu')
@endsection

@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <div class="banner">
        <div class="banner_background" style="background-image:url({{ asset('frontend/img/banner2.jpg') }})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image">

                </div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">@if(isset($main_slide->product_name)){{ $main_slide->product_name }} @else @endif</h1>
                        <div class="banner_price">
                            @if(isset($main_slide->selling_price))
                                @if ($main_slide->discount_price == Null)
                                <h2>${{ $main_slide->selling_price }}</h2>
                                @else
                                <span>${{ $main_slide->selling_price }} </span>${{ $main_slide->discount_price }}
                                @endif
                            @else  @endif
                        </div>
                        <div class="banner_product_name">{{ $main_slide->brand->brand_name ?? ''}}</div>
                        <div class="button banner_button"><a href="
                            @if(isset($main_slide->product_code)){{ url('/product/details/'.$main_slide->product_code.'/'.$main_slide->product_name) }}
                            @else @endif ">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="characteristics">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start btn" data-toggle="modal" data-target="#exampleModal">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Suivre commande</div>
                            <div class="char_subtitle">A partir de 50$</div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Livraison gratuite</div>
                            <div class="char_subtitle">A partir de 50$</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Gratuite livraison</div>
                            <div class="char_subtitle">A partir de 50$</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Gratuite livraison</div>
                            <div class="char_subtitle">A partir de 50$</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">



                    <div class="deals">
                        <div class="deals_title">Offre de la semaine</div>
                        <div class="deals_slider_container">


                            <div class="owl-carousel owl-theme deals_slider">
                                @foreach ($hot_deal as $item)
                                <!-- Deals Item -->
                                <div class="owl-item deals_item">
                                    <div class="deals_image">
                                        <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                        @else {{ asset('frontend/images/deals.png')}} @endif" alt="Deal_Of_Week_Image" style="width: 180px;">
                                    </div>
                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category">
                                            <a href="#">
                                                @if ($item->brand_id != Null)
                                                    {{ $item->brand->brand_name ?? '' }}
                                                @endif
                                            </a>
                                            </div>
                                            <div class="deals_item_price_a ml-auto">
                                                @if ($item->discount_price != Null)
                                                    ${{ $item->selling_price }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name"><a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">{{ $item->product_name }}</a></div>
                                            <div class="deals_item_price ml-auto">
                                                @if ($item->discount_price == Null)
                                                    ${{ $item->selling_price }}
                                                @else
                                                    ${{ $item->discount_price }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Disponible: <span>{{ $item->product_quantity }}</span></div>
                                                <div class="sold_title ml-auto">deja vendu: <span>28</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Vite Vite</div>
                                                <div class="deals_timer_subtitle">Solde fin en:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                        <span>hours</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                        <span>mins</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                        <span>secs</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Prochainement</li>
                                    <li>En vente</li>
                                    <li>plus vendu</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @foreach ($featured as $item)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                          @else {{ asset('frontend/images/featured_1.png')}} @endif " style="height: 100px; width: 100px;" alt="Product_image">
                                            </div>
                                            <div class="product_content">
                                    <!-- Discount Section -->
                                                @if ($item->discount_price == Null)
                                                    <br><span class="text-danger"><b> ${{ $item->selling_price }}</b></span>
                                                @else
                                                    <div class="product_price discount">
                                                    ${{ $item->discount_price }}<span>${{ $item->selling_price }}</span>
                                                    </div>
                                                @endif
                                    <!-- End Discount Section -->
                                                <div class="product_name"><div><a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">{{ $item->product_name }}</a></div></div>
                                                <div class="product_extras">
                                                    {{-- <button class="product_cart_button addcart" data-id="{{ $item->id }}">Add to Cart</button> --}} <!--add to cart-->
                                                    <button id="{{ $item->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                        data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                    </button>
                                                </div>
                                            </div>
                                    <!-- Wishlist Section -->
                                            <button id="wishlist" class="addwishlist" data-id="{{ $item->id }}">
                                                <div class="product_fav">
                                                    <i class="fa fa-heart text-info"></i>
                                                </div>
                                            </button>
                                    <!-- End Wishlist Section -->
                                            <ul class="product_marks">
                                                @if ($item->discount_price == Null)
                                                    <li class="product_mark product_discount" style="background: green;">Nouveau</li>
                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = $amount / $item->selling_price * 100;
                                                    @endphp
                                                    <li class="product_mark product_discount">
                                                        {{ intval($discount) }}%
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">
                                    @foreach ($trends as $row)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="@if(isset($row->image_one)){{ asset('backend/media/product/'.$row->image_one) }}
                                                          @else {{ asset('frontend/images/featured_1.png')}} @endif " style="height: 100px; width: 100px;" alt="Product_image">
                                            </div>
                                            <div class="product_content">
                                    {{-- Discount Section --}}
                                                @if ($row->discount_price == Null)
                                                    <br><span class="text-danger"><b> ${{ $row->selling_price }}</b></span>
                                                @else
                                                    <div class="product_price discount">
                                                    ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                    </div>
                                                @endif
                                    {{-- Discount Section --}}
                                                <div class="product_name"><div><a href="{{ url('/product/details/'.$row->product_code.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div></div>
                                                <div class="product_extras">
                                                     {{-- <button class="product_cart_button addcart" data-id="{{ $item->id }}">Add to Cart</button> --}} <!--add to cart-->
                                                     <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                        data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                    </button>
                                                </div>
                                            </div>
                                    {{-- Wishlist Section --}}
                                            <button id="wishlist" class="addwishlist" data-id="{{ $row->id }}">
                                                <div class="product_fav">
                                                    <i class="fa fa-heart text-info"></i>
                                                </div>
                                            </button>
                                    {{-- End Wishlist Section --}}
                                            <ul class="product_marks">
                                                @if ($row->discount_price == Null)
                                                    <li class="product_mark product_discount" style="background: green;">Nouveau</li>
                                                @else
                                                    @php
                                                        $amount = $row->selling_price - $row->discount_price;
                                                        $discout = $amount / $row->discount_price * 100;
                                                    @endphp
                                                    <li class="product_mark product_discount">
                                                        {{ intval($discout) }}%
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">
                                    @foreach ($best_rated as $row)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="@if(isset($row->image_one)){{ asset('backend/media/product/'.$row->image_one) }}
                                                          @else {{ asset('frontend/images/featured_1.png')}} @endif " style="height: 100px; width: 100px;" alt="Product_image">
                                            </div>
                                            <div class="product_content">
                                                @if ($row->discount_price == Null)
                                                    <br><span class="text-danger"><b> ${{ $row->selling_price }}</b></span>
                                                @else
                                                    <div class="product_price discount">
                                                    ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                    </div>
                                                @endif
                                                <div class="product_name"><div><a href="{{ url('/product/details/'.$row->product_code.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div></div>
                                                <div class="product_extras">
                                                     {{-- <button class="product_cart_button addcart" data-id="{{ $item->id }}">Add to Cart</button> --}} <!--add to cart-->
                                                     <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                        data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                    </button>
                                                </div>
                                            </div>
                                    {{-- Wishlist Section --}}
                                                <button id="wishlist" class="addwishlist" data-id="{{ $row->id }}">
                                                    <div class="product_fav">
                                                        <i class="fa fa-heart text-info"></i>
                                                    </div>
                                                </button>
                                    {{-- End Wishlist Section --}}
                                            <ul class="product_marks">
                                                @if ($row->discount_price == Null)
                                                    <li class="product_mark product_discount" style="background: green;">Nouveau</li>
                                                @else
                                                    @php
                                                        $amount = $row->selling_price - $row->discount_price;
                                                        $discout = $amount / $row->discount_price * 100;
                                                    @endphp
                                                    <li class="product_mark product_discount">
                                                        {{ intval($discout) }}%
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Categories popolaires</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">
                            <!-- Popular Categories Item -->
                            @foreach ($category as $item)
                                <a href="{{ url('/products/category/'.$item->id.'/'.$item->category_name) }}">
                                <div class="owl-item" style="color: black;">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img src="{{ asset('frontend/images/popular_1.png') }}" alt=""></div>
                                        <div class="popular_category_text">{{ $item->category_name ?? ''}}</div>
                                    </div>
                                </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mid Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">
                <!-- Banner 2 Slider Item -->
                @foreach ($mid_slider as $item)
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">
                                            @if ($item->subcategory_id != null)
                                                {{ $item->subcategory->subcategory_name }}
                                            @else
                                                {{ $item->category->category_name }}
                                            @endif
                                        </div>
                                        <div class="banner_2_title">{{ $item->product_name }}</div>
                                        <div class="banner_2_text">{{  $item->brand->brand_name ?? '' }}</div>
                                        <div class="banner_2_text">Product Code : {{  $item->product_code }}</div>
                                        {{-- <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                                        <div class="button banner_2_button"><a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">Explorer</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset('backend/media/product/' .$item->image_one)}}" style="height: 320px; width: 350px;"  alt="slide_image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">nouveaux arrivés</div>
                            <ul class="clearfix">
                                <li class="active">Cuir</li>
                                <li>SAC en cuir</li>
                                <li>Sabot en cuir</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">
                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($electronic as $item)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                              @else {{ asset('frontend/images')}} @endif " style="height: 100px; width: 80px;" alt="Product_image">
                                                </div>
                                                <div class="product_content">
                                                <!-- Discount Section -->
                                                    @if ($item->discount_price == Null)
                                                        <br><span class="text-danger"><b> ${{ $item->selling_price ?? ''}}</b></span>
                                                    @else
                                                        <div class="product_price discount">
                                                        ${{ $item->discount_price }}<span>${{ $item->selling_price }}</span>
                                                        </div>
                                                    @endif
                                                <!--End Discount Section -->
                                                    <div class="product_name"><div><a href="#">{{ $item->product_name }}</a></div></div>
                                                    <div class="product_extras">

                                                        <button id="{{ $item->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                            data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                        </button>
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
                                                        <li class="product_mark product_discount" style="background: green;">New</li>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = $amount / $item->selling_price * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach ($mans_passion as $item)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                              @else {{ asset('frontend/images')}} @endif " style="height: 100px; width: 100px;" alt="Product_image">
                                                </div>
                                                <div class="product_content">
                                        <!-- Discount Section -->
                                                    @if ($item->discount_price == Null)
                                                        <br><span class="text-danger"><b> ${{ $item->selling_price }}</b></span>
                                                    @else
                                                        <div class="product_price discount">
                                                        ${{ $item->discount_price }}<span>${{ $item->selling_price }}</span>
                                                        </div>
                                                    @endif
                                        <!--End Discount Section -->
                                                    <div class="product_name"><div><a href="#">{{ $item->product_name }}</a></div></div>
                                                    <div class="product_extras">
                                                        <!-- <button class="product_cart_button addcart" data-id="{{ $item->id }}">Add to Cart</button> add to cart-->
                                                        <button id="{{ $item->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                            data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                        </button>
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
                                                        <li class="product_mark product_discount" style="background: green;">nouveau</li>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = $amount / $item->selling_price * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">
                                        <!-- Slider Item -->
                                        @foreach ($womans_passion as $item)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                              @else {{ asset('frontend/images')}} @endif " style="height: 100px; width: 100px;" alt="Product_image">
                                                </div>
                                                <div class="product_content">
                                        <!-- Discount Section -->
                                                    @if ($item->discount_price == Null)
                                                        <br><span class="text-danger"><b> ${{ $item->selling_price }}</b></span>
                                                    @else
                                                        <div class="product_price discount">
                                                        ${{ $item->discount_price }}<span>${{ $item->selling_price }}</span>
                                                        </div>
                                                    @endif
                                        <!--End Discount Section -->
                                                    <div class="product_name"><div><a href="#">{{ $item->product_name }}</a></div></div>
                                                    <div class="product_extras">
                                                        <button id="{{ $item->id }}" class="product_cart_button addcart" data-toggle="modal"
                                                            data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                        </button>
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
                                                        <li class="product_mark product_discount" style="background: green;">New</li>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = $amount / $item->selling_price * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    @if ($discout_product == Null)
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <div class="arrivals_single_image"><img src="{{ asset('frontend/img/41r9I3xo1YL.jpg') }}" alt=""></div>
                                            <div class="arrivals_single_content">
                                                <div class="arrivals_single_category"><a href="#">Solde</a></div>
                                                <div class="arrivals_single_name_container clearfix">
                                                    <div class="arrivals_single_name"><a href="#">pas de solde</a></div>
                                                    <div class="arrivals_single_price text-right">00.00</div>
                                                </div>
                                                <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                <form action="#"><button class="arrivals_single_button">Ajouter au panier</button></form>
                                            </div>
                                            <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                                            <ul class="arrivals_single_marks product_marks">
                                                <li class="arrivals_single_mark product_mark product_new">nouveau</li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <div class="arrivals_single_image">
                                                <img src="@if(isset($discout_product->image_one)){{ asset('backend/media/product/'.$discout_product->image_one) }}
                                                    @else {{ asset('frontend/images/banner_product.png') }} @endif " alt="">
                                            </div>
                                            <div class="arrivals_single_content">
                                                <div class="arrivals_single_category"><a href="#">{{ $discout_product->brand->brand_name ?? '' }}</a></div><br>
                                                <div class="arrivals_single_name_container clearfix">
                                                    <div class="arrivals_single_name">
                                                        <a style="font-size: 20px; color: rgb(8, 5, 19);" href="{{ url('/product/details/'.$discout_product->product_code.'/'.$discout_product->product_name) }}">{{ $discout_product->product_name ?? ''}}</a>
                                                    </div>
                                                    <div class="arrivals_single_price text-right">
                                                        <div class="product_price discount">
                                                            ${{ $discout_product->discount_price ?? ''}}<span>${{ $discout_product->selling_price  ?? ''}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                                        <!-- Add to Cart --->
                                                {{-- <button class="arrivals_single_button addcart" data-id="{{ $item->id }}">Add to Cart</button> --}}<!--add to cart-->
                                                <button id="{{ $discout_product->id }}" class="arrivals_single_button addcart" data-toggle="modal"
                                                    data-target="#cartmodal" onclick="productview(this.id)">Ajouter au panier
                                                </button>
                                        <!-- Add to Cart --->
                                            </div>
                                        <!-- wishlist --->
                                            <a id="wishlist" class="addwishlist" data-id="{{ $item->id }}">
                                                <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                                            </a>
                                        <!-- End wishlist --->
                                            <ul class="arrivals_single_marks product_marks">
                                                @if ($main_slide->discount_price == Null )
                                                    <li class="product_mark product_discount" style="background: green;">New</li>
                                                @else
                                                    @php
                                                        $amount = $main_slide->selling_price - $main_slide->discount_price;
                                                        $discount = $amount / $main_slide->selling_price * 100;
                                                    @endphp
                                                    <li class="product_mark product_discount">
                                                        {{ intval($discount) }}%
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Best Sellers -->

    <div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">les plus achetés</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
								<li>Tapis marocains</li>
								<li>Poterie</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">
                            <!-- Best Sellers Slider -->
                            <div class="bestsellers_slider slider">
                                @foreach ($top20 as $item)
                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img src="
                                                @if(isset($item->image_one)){{ asset('backend/media/product/'. $item->image_one) }}"
                                                @else {{ asset('frontend/images/best_1.png') }} @endif alt="product_image">
                                            </div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category">{{ $item->subcategory->subcategory_name }}</div>
                                                <div class="bestsellers_name"><a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">{{ $item->product_name }}</a></div>
                                                {{-- <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                                                <div class="bestsellers_price discount">
                                                    @if($item->discount_price == NULL)
                                                        ${{ $item->selling_price }}
                                                    @else
                                                        ${{ $item->discount_price }} <span>${{ $item->selling_price }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <button id="wishlist" data-id="{{ $item->id }}">
                                            <div class="bestsellers_fav active">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                        </button>

                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">nouveau</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>

						<div class="bestsellers_panel panel">
                            <!-- Best Sellers Slider -->
                            <div class="bestsellers_slider slider">
                                @foreach ($electro_home_accesso as $item)
                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_1.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">theierie</a></div>
                                                <div class="bestsellers_name"><a href="product.html">{{ $name ?? '' }}</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">nouveau</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>

						<div class="bestsellers_panel panel">
                            <!-- Best Sellers Slider -->
                            <div class="bestsellers_slider slider">
                                @foreach ($sports_automotive as $item)
                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_1.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">poufet</a></div>
                                                <div class="bestsellers_name"><a href="product.html">poufet cuir rouge</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">nouveau</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

    <div class="adverts">
        <div class="container">
            <div class="row">
                @foreach ($hot_new as $item)

                    <div class="col-lg-4 advert_col">
                        <a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">
                        <!-- Advert Item -->

                        <div class="advert d-flex flex-row align-items-center justify-content-start">
                            <div class="advert_content">
                                <div class="advert_title">classement 2021</div>
                                <div class="advert_text">{{ $item->product_name }}</div>
                            </div>
                            <div class="ml-auto"><div class="advert_image"><img src="{{ asset('backend/media/product/'. $item->image_one) }}" alt="product-image" style="height: 150px;"></div></div>
                        </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <!-- ByeOne GetOne -->

    <div class="trends">
        <div class="trends_background" style="background-image:url({{ asset('frontend/images/trends_background.jpg') }})"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- ByeOne GetOne Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">achter et gagner</h2>
                        <div class="trends_text"><p>en arrivant a 900$ d'achat vous auriez la chance de gagner un produit de votre choix .</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9">
                    <div class="trends_slider_container">



                        <div class="owl-carousel owl-theme trends_slider">


                            @foreach ($ByeGet as $item)
                                <div class="owl-item">
                                    <div class="trends_item is_new">
                                        <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="@if(isset($item->image_one)){{ asset('backend/media/product/'.$item->image_one) }}
                                                @else {{ asset('frontend/images/banner_product.png') }} @endif " style="height: 170px; width: 140Px;" alt="ByeOne GetOne">
                                        </div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a href="#">{{ $item->category->category_name }}</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="product.html">{{ $item->product_name }}</a></div>
                                                <div class="trends_price">

                                                    @if ($item->discount_price == Null)
                                                        <br><span class="text-danger"><b> ${{ $item->selling_price }}</b></span>
                                                    @else
                                                        <div class="product_price discount">
                                                        ${{ $item->discount_price }}<span>${{ $item->selling_price }}</span>
                                                        </div>
                                                    @endif
                                        <!--End Discount Section -->
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            @if ($item->discount_price == Null)
                                                    <li class="product_mark trends_new" style="background: green;">New</li>
                                            @else
                                                @php
                                                    $amount = $item->selling_price - $item->discount_price;
                                                    $discount = $amount / $item->selling_price * 100;
                                                @endphp
                                                <li class="product_mark trends_discount">
                                                    {{ intval($discount) }}%
                                                </li>
                                            @endif
                                        </ul>

                                        <a id="wishlist" class="addwishlist" data-id="{{ $item->id }}">
                                            <div class="trends_fav">
                                                <i class="fas fa-heart text-info"></i>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="reviews_title_container">
                        <h3 class="reviews_title">dernier avis</h3>
                        {{-- <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div> --}}
                    </div>

                    <div class="reviews_slider_container">


                        <div class="owl-carousel owl-theme reviews_slider">
                            @foreach ($reviewProduct as $item)


                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div><div class="review_image"><img src="{{ asset('backend/media/product/'. $item->product->image_one) }}" alt=""></div></div>
                                        <div class="review_content">
                                            <div class="review_name">{{ $item->user->name }}</div>
                                            <div class="review_rating_container">
                                                {{-- <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                                                <div class="review_time">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                                                </div>
                                            </div>
                                            <div class="review_text"><p>{{ $item->comment }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recents avis</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">



                        <div class="owl-carousel owl-theme viewed_slider">
                            @foreach ($random_products as $item)
                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img width="130" height="120" src="{{ asset('backend/media/product/'. $item->image_one) }}" alt="product-image"></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">
                                                @if($item->discount_price == NULL)
                                                    ${{ $item->selling_price }}
                                                @else
                                                    ${{ $item->discount_price }} <span>${{ $item->selling_price }}</span>
                                                @endif
                                            </div>
                                            <div class="viewed_name">
                                                <a href="{{ url('/product/details/'.$item->product_code.'/'.$item->product_name) }}">{{ $item->product_name }}</a>
                                            </div>
                                        </div>
                                        <ul class="item_marks">
                                            @if ($item->discount_price == Null)
                                                <li class="item_mark item_discount" style="background: green;">New</li>
                                            @else
                                                @php
                                                    $amount = $item->selling_price - $item->discount_price;
                                                    $discount = $amount / $item->selling_price * 100;
                                                @endphp
                                                <li class="item_mark item_discount">
                                                    {{ intval($discount) }}%
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">


                        <div class="owl-carousel owl-theme brands_slider">
                            @foreach ($brandlogo as $item)
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center">
                                    <img src="{{ asset('backend/media/brands/' .$item->brand_logo) ?? ''}}">
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.model.product_cart_modal')


@endsection
