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

    public function searchByDistance(Request $request)
    {
        // Coordinates given
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Search radius in kilometers
        $radius = 20; // Adjust this value according to your needs

        // Calculate maximum and minimum distance for search
        $minLatitude = $latitude - ($radius / 111);
        $maxLatitude = $latitude + ($radius / 111);
        $minLongitude = $longitude - ($radius / (111 * cos(deg2rad($latitude))));
        $maxLongitude = $longitude + ($radius / (111 * cos(deg2rad($latitude))));

        // Filter apartments based on distance
        $apartments = Apartment::whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->get();

        return response()->json($apartments);
    }
}
