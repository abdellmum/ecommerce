@php
    $Setting = App\model\admin\Setting::first();
@endphp

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo">MARTISANAT<a href="{{ route('index') }}">

                        </a>
                        </div>
                    </div>
                    <div class="footer_title"> Questions? appelez nos  24/7</div>
                    <div class="footer_phone">
                        @if (isset($Setting->phone))
                            {{ $Setting->phone }}
                        @else
                            +212 626 565 101
                        @endif
                    </div>
                    <div class="footer_contact_text">
                            <p> 2 Boulevard my rachid </p>
                            <p> Youssoufia 46300, Maroc</p>

                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="@if(isset($Setting->facebook_url)){{ $Setting->facebook_url }}
                                        @else # @endif"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="@if(isset($Setting->twitter_url)){{ $Setting->twitter_url }}
                                        @else # @endif"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="@if(isset($Setting->youtube_url)){{ $Setting->youtube_url }}
                                        @else # @endif"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="@if(isset($Setting->google_url)){{ $Setting->google_url }}
                                        @else # @endif"><i class="fab fa-google"></i></a></li>
                            <li><a href="@if(isset($Setting->vimeo_url)){{ $Setting->vimeo_url }}
                                        @else # @endif"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Menu rapide</div>
                    @foreach ($categories as $key => $row)
                        <ul class="footer_list">
                            <li><a href="{{ url('/products/category/'.$row->id.'/'.$row->category_name) }}">{{ $row->category_name }}</a></li>
                        </ul>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2">
                {{-- <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div> --}}
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">services</div>
                    <ul class="footer_list">
                        <li><a href="{{ route('login') }}">Mon compte</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">commande</a></li>
                        <li><a href="{{ route('cart.product.list') }}">Cart List</a></li>
                        <li><a href="#"> Services clients</a></li>
                        <li><a href="#">Retour/ change</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Produits Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>



<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content" style="margin: 0 auto;text-align: center;">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> tous droits reservés | Cette plateforme est faite avec
                        <i class="fa fa-heart" aria-hidden="true"></i> par ABDELKARIM NOUAOURI , pour les associations de youssoufia

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
