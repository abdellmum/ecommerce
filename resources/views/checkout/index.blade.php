@extends('layouts.master')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Page de paiement</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="#" class="my-4">
                    <div id="card-element">
<script src="https://js.stripe.com/v3/"></script>
                    </div>


                    <div id="card-errors" role="alert"></div>

                    <button class="btn btn-success mt-3" id="submit">Procéder au paiement</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
<script>
    var stripe = Stripe('pk_test_51JCiNhLexjMV6g6h2ZtppD6RfkEjzDOkH4Qd6tZXbXlLzNefRRX4cTSoalONgBQ9cCuJG5dcLiXKaUAAVmE6JZZz00oeW1kzxX');
    var elements = stripe.elements();
    var style = {
        base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4"
        }
        },
        invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');

    submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
            card: card
        }
        }).then(function(result) {
            if (result.error) {

            console.log(result.error.message);
            } else {

                if (result.paymentIntent.status === 'succeeded') {

                    console.log(result.paymentIntent);
                }
            }
        });
    });
</script>
@endsection
