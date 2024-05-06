let form = document.getElementById('payment-form');
let dropinContainer = document.getElementById('dropin-container');
let buyBtn = document.querySelectorAll('.btn-buy')

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