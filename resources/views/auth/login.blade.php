@extends('frontend.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; margin-top:10px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Conexxion</div>

                        <form action="{{ route('login') }}" method="POST" id="contact_form">
                            @csrf

                            <div class="form-group icon_parent">
                                <label for="email">email ou teleohone</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address Or Phone">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>
                            <div class="form-group icon_parent">
                                <label for="password">Mot de pass</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

							<div class="form-group">
                                <a href="{{ route('password.request') }}" class="text-black">mot de pass oublié</a><br><br>
								<button type="submit" class="btn btn-info">connexion</button>
							</div>
						</form><br><br>

                        <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-facebook" aria-hidden="true" style="letter-spacing: 10px"></i>connexion avec</button><br>
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-block btn-danger"><i class="fa fa-google" aria-hidden="true" style="letter-spacing: 10px"></i>connexion avecGoogle</a>
					</div>
                </div>

                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; margin-top:10px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">S'inscrire</div>

                        <form action="{{ route('register') }}" method="POST" id="contact_form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">nom d'utilisteur</label>
                                <input type="text" class="form-control @error('name') is-invalid  @enderror" value="{{ old('name') }}" name="name" id="name" autocomplete="name" autofocus placeholder="Please Full Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">telePhone</label>
                                <input type="number" class="form-control @error('phone') is-invalid  @enderror" value="{{ old('phone') }}" name="phone" id="phone" autocomplete="phone" autofocus placeholder="Please Phone Number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid  @enderror" value="{{ old('email') }}" name="email" id="email" autocomplete="email" autofocus placeholder="Please Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">mot de pass</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  autocomplete="new-password" placeholder="Password ****">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Retaper mot de pass</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" autocomplete="new-password" placeholder="Confirm Password">
                            </div>
							<div class="contact_form_button">
								<button type="submit" class="btn btn-success">inscription</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
    </div>

@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('frontend/js/contact_custom.js') }}"></script>
@endpush

