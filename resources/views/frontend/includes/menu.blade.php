@php
    $Setting = App\model\admin\Setting::select('phone1', 'email')->first();
@endphp

<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page_menu_content">

                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">
                        <li class="page_menu_item has-children">
                            <a href="">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                @if(Session::get('language') == 'bangla')
                                    <li><a href="{{ route('language.english') }}">Français<i class="fa fa-angle-down"></i></a></li>
                                @else
                                    <li><a href="{{ route('language.bangla') }}">Anglais<i class="fa fa-angle-down"></i></a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="page_menu_item">
                            <a href="{{ route('index') }}">Accueil<i class="fa fa-angle-down"></i></a>
                        </li>
                        <li class="page_menu_item"><a href="{{ route('product.shop') }}">Produits<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item"><a href="{{ route('all.blog.show') }}">blog<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item"><a href="{{ route('user.contact') }}">contact<i class="fa fa-angle-down"></i></a></li>
                    </ul>

                    <div class="menu_contact">
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('frontend/images/phone_white.png') }}" alt=""></div>
                            @if (isset($Setting->phone1))
                                {{ $Setting->phone1 }}
                            @else
                                +212 626 565 101
                            @endif
                        </div>
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('frontend/images/mail_white.png') }}" alt=""></div>
                            <a href="comtact@martisana.ma">

                                contact@martisanat.ma

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
