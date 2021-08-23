<div class="newsletter">
    <div class="container">
        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt=""></div>
                        <div class="newsletter_title">abonnez vous en Newsletter</div>
                        <div class="newsletter_text"><p>...et recevez %20 coupon pour la prémiere commande.</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{ route('store.newsletter') }}" method="POST" class="newsletter_form">
                            @csrf
                            <input type="email" name="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button type="submit" class="newsletter_button">Abonnement</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">desbonnement</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
