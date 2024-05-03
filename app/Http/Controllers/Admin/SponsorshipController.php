<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Braintree\Transaction as BraintreeTransaction;

class SponsorshipController extends Controller
{
    public function showForm()
    {
        // Ottieni l'ID dell'utente autenticato
        $userId = auth()->id();

        // Ottieni solo gli appartamenti dell'utente autenticato
        $apartments = Apartment::where('user_id', $userId)->get();
        $sponsorships = Sponsorship::all();

        return view('admin.apartments.sponsorship', compact('apartments', 'sponsorships'));
    }

    public function sponsorship(Request $request)
    {

        // Validazione dei dati
        $data = $request->validate([
            'apartment' => 'required|exists:apartments,id',
            'sponsorship' => 'required|in:1,2,3',
            'expiration' => 'nullable' // Assicurati che expiration sia valido, poiché è nullable
        ]);

        // Trova l'appartamento
        $apartment = Apartment::findOrFail($data['apartment']);

        // Trova la sponsorizzazione selezionata
        $sponsorship = Sponsorship::findOrFail($data['sponsorship']);
        $durationHours = $sponsorship->duration;

        $amount = $sponsorship->fee;

        // Calcola il costo della sponsorizzazione
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $paymentMethodNonce = $request->input('payment_method_nonce');

        // Ora gestisci il pagamento con Braintree
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $paymentMethodNonce, // Da sostituire con il nonce reale generato dal client-side
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Verifica se il pagamento è avvenuto con successo
        if ($result->success) {
            // Calcola la scadenza 24 ore dopo la sponsorizzazione
            $expiration = Carbon::now('UTC')->addHours($durationHours)->setTimezone('Europe/Rome');;

            // Collega l'appartamento alla sponsorship e imposta expiration nella tabella pivot
            $apartment->sponsorships()->attach($data['sponsorship'], ['expiration' => $expiration]);

            return redirect()->route('admin.apartments.index')->with('success', 'Appartamento sponsorizzato con successo!');
        } else {
            // Se il pagamento fallisce, gestisci di conseguenza
            return back()->with('error', 'Errore durante il pagamento: ' . $result->message);
        }
    }
}