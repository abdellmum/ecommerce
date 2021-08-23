@php
    $Setting = App\model\admin\Setting::select('phone1', 'email')->first();
@endphp

<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt=""></div>
                    @if (isset($Setting->phone))
                        {{ $Setting->phone }}
                    @else
                        +212 626 565 101
                    @endif
                </div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></div>

                        contact@martisana.ma

                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="top_bar_contact_item"><i class="fa fa-truck" aria-hidden="true"></i><a href="" data-toggle="modal" data-target="#exampleModal">  suivre ma commande</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                @if(Session::get('language') == 'bangla')
                                    <a href="{{ route('language.english') }}">frnaçais<i class="fas fa-chevron-down"></i></a>
                                @else
                                    <a href="{{ route('language.bangla') }}">anglais<i class="fas fa-chevron-down"></i></a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        @guest
                            <div><a href="{{ route('login') }}"><div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="user icon"></div> inscription/connexion</a></div>
                        @else
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="{{ route('home') }}"><div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="user icon"></div> Profile<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{ route('user.wishlist') }}">Panier</a></li>
                                        <li><a href="{{ route('user.checkout') }}">Payement</a></li>
                                        <li><a href="{{ route('user.logout') }}">deconexion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

