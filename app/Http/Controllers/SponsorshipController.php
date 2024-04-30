<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function showForm()
    {
        // Ottieni l'ID dell'utente autenticato
        $userId = auth()->id();

        // Ottieni solo gli appartamenti dell'utente autenticato
        $apartments = Apartment::where('user_id', $userId)->get();

        return view('admin.apartments.sponsorship', compact('apartments'));
    }

    public function sponsorship(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'apartment' => 'required|exists:apartments,id',
            'sponsorship' => 'required|in:1,2,3',
        ]);


        // Logica per sponsorizzare l'appartamento
        $apartment = Apartment::find($request->apartment);
        $scadenza = now()->addHours($request->pacchetto == 1 ? 24 : ($request->pacchetto == 2 ? 72 : 144));

        $sponsorship = new Sponsorship();

        $sponsorship->apartment_id = $apartment->id;
        $sponsorship->expiration = $scadenza;
        $sponsorship->save();

        $apartment->sponsorships()->attach($sponsorship->id);

        // $apartment->services()->attach($request['services']);


        return to_route('admin.apartments.index')->with('success', 'apartment sponsorizzato con successo!');
    }
}
