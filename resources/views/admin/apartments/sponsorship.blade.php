@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sponsorizza Appartamento</div>
                    <div class="card-body">
                        <form id="payment-form" method="POST" action="{{ route('admin.sponsorship.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="apartment">Seleziona l'appartamento da sponsorizzare:</label>
                                <select name="apartment" id="apartment" class="form-control">
                                    @foreach ($apartments as $apartment)
                                        <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sponsorship">Seleziona il tipo di sponsorizzazione:</label>
                                <select name="sponsorship" id="sponsorship" class="form-control">
                                    @foreach ($sponsorships as $sponsorship)
                                        <option value="{{ $sponsorship->id }}">{{ $sponsorship->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="dropin-container"></div>
                            <button type="submit" id="submit-button" class="btn btn-primary">Paga e Sponsorizza</button>
                            <button type="button" id="cancel-button" class="btn btn-secondary">Annulla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.js"></script>
    <script>
        let form = document.getElementById('payment-form');
        let dropinContainer = document.getElementById('dropin-container');

        braintree.dropin.create({
            authorization: 'sandbox_hctvp4tg_4btxgk9wmhbyp96h',
            selector: '#dropin-container'
        }, function (err, dropinInstance) {
            if (err) {
                console.error(err);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                dropinInstance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    // Aggiungi il nonce al modulo di pagamento
                    let nonceInput = document.createElement('input');
                    nonceInput.setAttribute('type', 'hidden');
                    nonceInput.setAttribute('name', 'payment_method_nonce');
                    nonceInput.setAttribute('value', payload.nonce);
                    form.appendChild(nonceInput);

                    // Invia il modulo di pagamento al server
                    form.submit();
                });
            });

            // Aggiungi un pulsante per annullare il pagamento
            let cancelButton = document.getElementById('cancel-button');
            cancelButton.addEventListener('click', function () {
                dropinInstance.clearSelectedPaymentMethod();
            });
        });
    </script>
@endsection
