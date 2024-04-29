<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::whereIsVisible(true)->get();

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
    public function show(Apartment $apartment)
    {
        //
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
            ->orderBy('distance')
            ->get();

        return response()->json($apartments);
    }
}
