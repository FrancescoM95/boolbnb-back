<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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

        $sponsorship = Sponsorship::findOrFail($data['sponsorship']);
        $durationHours = $sponsorship->duration;

        // Calcola la scadenza 24 ore dopo la sponsorizzazione
        $expiration = Carbon::now()->addHours($durationHours);

        // Collega l'appartamento alla sponsorship e imposta expiration nella tabella pivot
        $apartment->sponsorships()->attach($data['sponsorship'], ['expiration' => $expiration]);

        return redirect()->route('admin.apartments.index')->with('success', 'Appartamento sponsorizzato con successo!');
    }
}
