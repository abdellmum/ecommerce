<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main_nav_content d-flex flex-row">

               $

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>
                        <ul class="cat_menu">
                            @foreach ($categories as $row)
                            <li class="hassubs">
                                <a href="{{ url('/products/category/'.$row->id.'/'.$row->category_name) }}">{{ $row->category_name }}<i class="fas fa-chevron-right"></i></a>
                                <ul>
                                    @php
                                        $subcategories = DB::table('sub__categories')
                                            ->where('category_id',$row->id)
                                            ->get();
                                    @endphp
                                    @foreach ($subcategories as $row)
                                        <li>
                                            <a href="{{ url('/product/subcategory/'.$row->id.'/'.$row->subcategory_name) }}">{{ $row->subcategory_name }}<i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ route('index') }}">Accueil<i class="fas fa-chevron-down"></i></a></li>
                            <li class="hassubs">
                                <a href="{{ route('product.shop') }}">Produits</a>
                            </li>
                            <li class="hassubs">
                                <a href="{{ route('all.blog.show') }}">Blog</a>
                            </li>
                            <li class="hassubs">
                                <a href="{{ route('user.contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>


                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
