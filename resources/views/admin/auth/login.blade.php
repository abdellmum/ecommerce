@extends('admin.admin_layouts')

@section('admin_content')

     <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">MARTISANAT <span class="tx-info tx-normal">administrateur</span></div>
        <div class="tx-center mg-b-60">MARTISANAT</div>

        <form action="{{route('admin.login')}}" class="d-block" method="post">
            @csrf

            <div class="form-group">
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Addresse Email " >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter mot de pass" >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Mot de pass oublié</a>
            </div>
            <button type="submit" class="btn btn-info btn-block">Connexion</button>
        </form>
      </div><
    </div>
@endsection
