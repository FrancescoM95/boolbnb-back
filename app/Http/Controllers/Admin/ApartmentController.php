<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreApartmentRequest;
use App\Http\Requests\Apartment\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::whereUserId(Auth::user()->id)->get();

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartment = new Apartment();
        $services = Service::select('label', 'id', 'icon')->get();

        return view('admin.apartments.create', compact('apartment', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {

        //Auth::user()->name
        $data = $request->validated();
        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->slug = Str::slug($apartment->title);
        $apartment->is_visible = Arr::exists($data, 'is_visible');
        $apartment->user_id = Auth::user()->id;
        $apartment->save();

        if (Arr::exists($data, 'services')) {
            $apartment->services()->attach($data['services']);
        }

        return to_route('admin.apartments.show', $apartment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::select('label', 'id', 'icon')->get();

        $prev_services = $apartment->services->pluck('id')->toArray();

        return view('admin.apartments.edit', compact('apartment', 'services', 'prev_services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();
        $apartment->fill($data);
        $apartment->slug = Str::slug($apartment->title);
        $apartment->is_visible = Arr::exists($data, 'is_visible');
        $apartment->user_id = Auth::user()->id;
        $apartment->save();

        if (Arr::exists($data, 'services')) {
            $apartment->services()->sync($data['services']);
        }
        return to_route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return to_route('admin.apartments.index');
    }

    // * Rotte Soft Delete

    public function trash()
    {
        $apartments = Apartment::onlyTrashed()->get();
        return view('admin.apartments.trash', compact('apartments'));
    }

    public function restore(Apartment $apartment)
    {
        $apartment->restore();
        return to_route('admin.apartments.index')->with('type', 'success')->with('message', 'Appartamento ripristinato con successo');
    }

    public function drop(Apartment $apartment)
    {
        if ($apartment->has('services')) $apartment->services()->detach();
        // if ($apartment->has('sponsorships')) $apartment->sponsorships()->detach();
        $apartment->forceDelete();
        return to_route('admin.apartments.trash')->with('type', 'warning')->with('message', 'Appartamento eliminato definitivamente');
    }

    // Rotte Delete All e Restore all
    public function massiveDrop()
    {
        $apartments = Apartment::onlyTrashed()->get();
        foreach ($apartments as $apartment) {
            $apartment->forceDelete();
        }
        return to_route('admin.apartments.trash')->with('type', 'warning')->with('message', 'Tutti gli appartamenti sono stati eliminati definitivamente');
    }

    public function massiveRestore()
    {
        $apartments = Apartment::onlyTrashed()->get();
        foreach ($apartments as $apartment) {
            $apartment->restore();
        }
        return to_route('admin.apartments.index')->with('type', 'success')->with('message', 'Tutti gli appartamenti sono stati ripristinati con successo');
    }
}
