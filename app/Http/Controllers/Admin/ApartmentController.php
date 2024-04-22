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
use Illuminate\Support\Facades\Storage;

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

        $data['latitude'] = floatval($data['latitude']);
        $data['longitude'] = floatval($data['longitude']);

        $apartment = new Apartment();
        $apartment->fill($data);

        $apartment->slug = Str::slug($apartment->title);
        $apartment->is_visible = Arr::exists($data, 'is_visible');
        $apartment->user_id = Auth::user()->id;
        if (Arr::exists($data, 'cover_image')) {
            $extension = $data['cover_image']->extension();
            //lo salvo e prendo l'url
            $img_url = Storage::putFileAs('apartment_images', $data['cover_image'], "$apartment->slug.$extension");
            $apartment->cover_image = $img_url;
        }
        $apartment->save();

        //dopo aver salvato il modello, se ci sono i services li aggancio alla tabella ponte

        if (Arr::exists($data, 'services')) {
            $apartment->services()->attach($data['services']);
        }



        return to_route('admin.apartments.show', $apartment->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $apartment = Apartment::whereSlug($slug)->withTrashed()->first();
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
        $data['slug'] = Str::slug($data['title']);
        $data['is_visible'] = Arr::exists($data, 'is_visible');
        $data['user_id'] = Auth::user()->id;

        if (Arr::exists($data, 'image')) {
            $extension = $data['cover_image']->extension();
            if ($apartment->cover_image) Storage::delete($apartment->cover_image); //Cancello la vecchia immagine associata al file
            $img_url = Storage::putFileAs('apartment_images', $data['cover_image'], "{$data['slug']}.$extension");
            $apartment->cover_image = $img_url;
        }


        $apartment->update($data);

        if (Arr::exists($data, 'services')) {
            $apartment->services()->sync($data['services']);
        }

        elseif (!Arr::exists($data, 'tags') && count($apartment->services)) $apartment->services()->detach();

        return to_route('admin.apartments.show', $apartment->slug);
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
        if ($apartment->cover_image) Storage::delete($apartment->cover_image);
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


    //# ROTTA PUBBLICAZIONE

    public function togglePublication(Apartment $apartment)
    {
        $apartment->is_visible = !$apartment->is_visible;
        $apartment->save();

        return back();
    }
}
