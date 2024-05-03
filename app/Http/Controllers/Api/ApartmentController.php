<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti gli appartamenti visibili, ordinati per sponsorizzazione
        $apartments = Apartment::select('*', DB::raw('IF(id IN (SELECT apartment_id FROM apartment_sponsorship), 1, 0) AS sponsored'))
            ->whereIsVisible(true)
            ->orderBy('sponsored', 'desc') // Mette prima gli appartamenti sponsorizzati
            ->orderBy('created_at', 'desc') // Ordina per altri criteri, come la data di creazione
            ->get();

        return response()->json($apartments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $apartment = Apartment::whereIsVisible(true)->whereSlug($slug)->with('services')->first();
        if (!$apartment) {
            return response()->json(null, 404);
        }
        if ($apartment->image) {
            $apartment->image = url('storage/' . $apartment->image);
        }

        // Aggiorna il contatore delle visite
        $ip = request()->ip();
        $existingVisit = View::where('apartment_id', $apartment->id)->where('ip', $ip)->exists();
        if (!$existingVisit) {
            View::create([
                'apartment_id' => $apartment->id,
                'ip' => $ip
            ]);
        }

        return response()->json($apartment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }

    public function search(Request $request)
    {
        // Coordinate indirizzo selezionato dall'utente
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius'); // Raggio selezionato dall'utente
        $services = $request->input('services', []); // Servizi selezionati dall'utente
        $beds = $request->input('beds');
        $rooms = $request->input('rooms');

        // Calcola massima e minima distanza per la ricerca
        $minLatitude = $latitude - ($radius / 111);
        $maxLatitude = $latitude + ($radius / 111);
        $minLongitude = $longitude - ($radius / (111 * cos(deg2rad($latitude))));
        $maxLongitude = $longitude + ($radius / (111 * cos(deg2rad($latitude))));

        // Ottieni gli appartamenti ordinati per distanza
        $apartments = Apartment::selectRaw(
            "*,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance",
            [$latitude, $longitude, $latitude]
        )
            ->whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->where('rooms', '>=', $rooms)
            ->where('beds', '>=', $beds);

        // Filtra gli appartamenti che offrono tutti i servizi selezionati dall'utente
        foreach ($services as $service) {
            $apartments->whereHas('services', function ($query) use ($service) {
                $query->where('service_id', $service);
            });
        }

        // Esegui la query e ottieni gli appartamenti
        $apartments = $apartments->orderBy('distance')->get();

        return response()->json($apartments);
    }
}
