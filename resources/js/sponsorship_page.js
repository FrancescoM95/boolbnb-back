// Effetto card all'active
document.addEventListener("DOMContentLoaded", function () {
    let sponsorCards = document.querySelectorAll('.spons');

    sponsorCards.forEach(function (card) {
        card.addEventListener('click', function () {
            sponsorCards.forEach(function (c) {
                c.classList.remove('active');
            });
            card.classList.add('active');

            // Aggiorna il riepilogo dell'appartamento e della sponsorizzazione selezionati
            let apartmentTitle = document.getElementById('apartment').options[document.getElementById('apartment').selectedIndex].text;
            let sponsorLabel = card.querySelector('.title').innerText;
            let sponsorPrice = card.querySelector('.price').innerText;
            let sponsorDuration = card.querySelector('.pricing span').innerText;

            let selectedInfo = document.getElementById('selected-info');
            selectedInfo.innerHTML = `
                    <p><strong>Appartamento:</strong> ${apartmentTitle}</p>
                    <p><strong>Sponsorizzazione:</strong> ${sponsorLabel}</p>
                    <p><strong>Prezzo:</strong> ${sponsorPrice}</p>
                    <p><strong>Durata:</strong> ${sponsorDuration}</p>
                `;
        });
    });
});

// Braintree
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

// Appartamento selezionato dalla index impostato di default
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const apartmentId = urlParams.get('apartment_id');

    if (apartmentId) {
        document.getElementById('apartment').value = apartmentId;
    }
});