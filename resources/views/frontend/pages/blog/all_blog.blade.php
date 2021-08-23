@extends('frontend.app')

@section('category_menu')
    @include('frontend.includes.category_menu')
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_responsive.css') }}">
@endpush

@section('content')

    <!-- Home -->

	<div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src=""><img src="{{ asset('frontend/images/shop_background.jpg') }}" alt=""></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
            @if (Session::get('language') == 'bangla')
                <h2 class="home_title">MARTISANAT</h2>
            @else
                <h2 class="home_title">Blog Postes</h2>
            @endif

		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						@foreach ($Blog as $item)

                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url({{ asset('backend/media/post/' .$item->image) }})"></div>
                                @if (Session::get('language') == 'français')
                                    <div class="blog_text">{{ $item->post_title_bn }}</div>
                                @else
                                    <div class="blog_text">{{ $item->post_title_en }}</div>
                                @endif
                                @if (Session::get('language') == 'bangla')
                                    <div class="blog_button"><a href="">continuer la lecture</a></div>
                                @else
                                    <div class="blog_button"><a href="">Continue Reading</a></div>
                                @endif
                            </div>
						@endforeach
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection

<script src="{{ asset('frontend/js/blog_custom.js') }}"></script>
