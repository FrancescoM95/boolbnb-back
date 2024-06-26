@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}

@section('content')
    <div class="container" id="show">
        <header class="mt-3">
            <h1 class="text-center m-0">{{ $apartment->title }}</h1>
        </header>
        {{-- eyecatcher --}}
        <section id="eye-catcher" class="pb-3">
            <div class="d-flex justify-content-evenly">
                {{-- immagine --}}
                <div class="d-flex justify-content-center img-container col-lg-8 overflow-hidden">
                    @php
                        $imageName =
                            'apartment_images/' .
                            $apartment->slug .
                            '.' .
                            pathinfo($apartment->cover_image, PATHINFO_EXTENSION);
                        $imageUrl = asset('storage/' . $imageName);
                    @endphp

                    @if (Storage::disk('public')->exists($imageName))
                        <img src="{{ $imageUrl }}" alt="{{ $apartment->slug }}" class="img-fluid">
                    @else
                        <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->slug }}" class="img-fluid">
                    @endif
                </div>
                {{-- Vari link --}}
                <div class="d-none d-lg-flex row-cols-1 justify-content-evenly flex-column" id="cards-links">
                    {{-- Sponsorizza --}}
                    <div class="col">
                        <a href="{{ route('admin.sponsorship.show') }}">
                            <div
                                class="d-flex justify-content-between justify-content-md-center text-md-center card align-items-center flex-row px-2">
                                @if ($apartment->getSponsorshipExpirationsDate())
                                    <div class="sponsor-card">
                                        <p class="m-0">Sponsorizzato fino al:</p>
                                        <p class="m-0">{{ $apartment->getSponsorshipExpirationsDate() }}
                                            <i class="fa-solid fa-crown"></i>
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-arrow-right d-md-none"></i>
                                @else
                                    <div>
                                        <p class="m-0">Vuoi aumentare la visibilità?</p>
                                        <p class="m-0">Sponsorizza l'appartamento!
                                            <i class="fa-solid fa-crown"></i>
                                        </p>
                                    </div>
                                @endif
                                <i class="fa-solid fa-arrow-right d-md-none"></i>
                            </div>
                        </a>
                    </div>
                    {{-- Messaggi --}}
                    <div class="col">
                        <a href="{{ route('admin.messages.index', $apartment->id) }}">
                            <div
                                class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                                <div>
                                    <p class="m-0">Hai {{ $apartment->getMessageToRead() }}
                                        {{ $apartment->getMessageToRead() == 1 ? 'messaggio' : 'messaggi' }} da leggere</p>
                                    <p class="m-0">Vai all'inbox
                                        <i
                                            class="fa-solid {{ $apartment->getMessageToRead() > 0 ? 'fa-envelope-open-text' : 'fa-envelope-circle-check' }}"></i>
                                    </p>
                                </div>
                                <i class="fa-solid fa-arrow-right d-md-none"></i>
                            </div>
                        </a>
                    </div>
                    {{-- Statistiche --}}
                    <div class="col">
                        <a href="{{ route('admin.apartments.statistics', $apartment->id) }}">
                            <div
                                class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                                <div>
                                    <p class="m-0">Monitora l'andamento</p>
                                    <p class="m-0">Visualizza
                                        statistiche
                                        <i class="fa-solid fa-chart-line"></i>
                                    </p>
                                </div>
                                <i class="fa-solid fa-arrow-right d-md-none"></i>
                            </div>
                        </a>
                    </div>
                    {{-- Indirizzo --}}
                    <div class="col">
                        <a href="#apartment-map">
                            <div
                                class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                                <div>
                                    <p class="m-0">{{ $apartment->address }}</p>
                                    <p class="m-0">Trova su mappa <i class="fa-solid fa-map-location-dot"></i>
                                    </p>
                                </div>
                                <i class="fa-solid fa-arrow-down d-md-none"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Bottoni --}}
            <div class="d-flex justify-content-evenly mt-3">
                {{-- bottone indietro --}}
                <a href="@if ($apartment->deleted_at) {{ route('admin.apartments.trash') }} @else {{ route('admin.apartments.index') }} @endif"
                    class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
                {{-- bottone modifica / elimina --}}
                <a href="{{ route('admin.apartments.edit', $apartment->slug) }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-pencil me-2 d-none d-sm-inline"></i>Modifica</a>
                <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
                        <i class="fas fa-trash me-2 d-none d-sm-inline" data-bs-toggle="modal"
                            data-bs-target="#modal"></i>Elimina</button>
                </form>
            </div>
            {{-- Vari link --}}
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 justify-content-evenly row-gap-2 d-lg-none mt-3"
                id="cards-links">
                {{-- Sponsorizza --}}
                <div class="col">
                    <a href="{{ route('admin.sponsorship.show') }}">
                        <div
                            class="d-flex justify-content-between justify-content-md-center text-md-center card align-items-center flex-row px-2">
                            @if ($apartment->getSponsorshipExpirationsDate())
                                <div class="sponsor-card">
                                    <p class="m-0">Sponsorizzato fino al:</p>
                                    <p class="m-0">{{ $apartment->getSponsorshipExpirationsDate() }}
                                        <i class="fa-solid fa-crown"></i>
                                    </p>
                                </div>
                                <i class="fa-solid fa-arrow-right d-md-none"></i>
                            @else
                                <div>
                                    <p class="m-0">Vuoi aumentare la visibilità?</p>
                                    <p class="m-0">Sponsorizza l'appartamento!
                                        <i class="fa-solid fa-crown"></i>
                                    </p>
                                </div>
                                <i class="fa-solid fa-arrow-right d-md-none"></i>
                            @endif
                        </div>
                    </a>
                </div>
                {{-- Messaggi --}}
                <div class="col">
                    <a href="{{ route('admin.messages.index', $apartment->id) }}">
                        <div
                            class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                            <div>
                                <p class="m-0">Hai {{ $apartment->getMessageToRead() }}
                                    {{ $apartment->getMessageToRead() == 1 ? 'messaggio' : 'messaggi' }} da leggere</p>
                                <p class="m-0">Vai all'inbox
                                    <i
                                        class="fa-solid {{ $apartment->getMessageToRead() > 0 ? 'fa-envelope-open-text' : 'fa-envelope-circle-check' }}"></i>
                                </p>
                            </div>
                            <i class="fa-solid fa-arrow-right d-md-none"></i>
                        </div>
                    </a>
                </div>
                {{-- Statistiche --}}
                <div class="col">
                    <a href="{{ route('admin.apartments.statistics', $apartment->id) }}">
                        <div
                            class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                            <div>
                                <p class="m-0">Monitora l'andamento</p>
                                <p class="m-0">Visualizza
                                    statistiche
                                    <i class="fa-solid fa-chart-line"></i>
                                </p>
                            </div>
                            <i class="fa-solid fa-arrow-right d-md-none"></i>
                        </div>
                    </a>
                </div>
                {{-- Indirizzo --}}
                <div class="col">
                    <a href="#apartment-map">
                        <div
                            class="d-flex justify-content-between justify-content-md-center card align-items-center flex-row px-2 text-md-center">
                            <div>
                                <p class="m-0">{{ $apartment->address }}</p>
                                <p class="m-0">Trova su mappa <i class="fa-solid fa-map-location-dot"></i>
                                </p>
                            </div>
                            <i class="fa-solid fa-arrow-down d-md-none"></i>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        {{-- proprietà --}}
        <section id="details" class="pb-3 details-img">
            <h3 class="text-center pb-1 mb-3 bottom-border">Dettagli</h3>
            <ul class="row m-0 row-cols-1 row-cols-sm-2 row-cols-xl-4 list-unstyled">
                <li><span><i class="fa-solid fa-ruler-combined me-2 brand-color"></i> Metri quadri:
                        {{ $apartment->square_meters }}</span></li>
                <li><span><i class="fa-solid fa-door-closed me-2 brand-color"></i> Numero stanze:
                        {{ $apartment->rooms }}</span></li>
                <li><span><i class="fa-solid fa-bed me-2 brand-color"></i> Camere da letto: {{ $apartment->beds }}
                    </span></li>
                <li><span><i class="fa-solid fa-bath me-2 brand-color"></i> Numero bagni:{{ $apartment->baths }}
                    </span></li>
            </ul>
        </section>
        {{-- servizi --}}
        <section id="services" class="pb-3">
            <h3 class="text-center pb-1 mb-3 bottom-border">Servizi</h3>
            <ul class="row m-0 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 list-unstyled">
                @foreach ($apartment->services as $service)
                    <li><span><i class="{{ $service->icon }} me-2 brand-color"></i>
                            {{ $service->label }}</span></li>
                @endforeach
            </ul>
        </section>
        {{-- descrizione --}}
        <section id="description" class="pb-3">
            <h3 class="text-center pb-1 mb-3 bottom-border">Descrizione</h3>
            <p class="m-0">{{ $apartment->description }}</p>
        </section>
        {{-- mappa --}}
        <section id="apartment-map" class="pb-3">
            <h3 class="text-center pb-1 mb-3 bottom-border">Posizione</h3>
            <div id="map-div"></div>
        </section>
    </div>
    {{-- coordinate NASCOSTE per recupero in js --}}
    <div class="d-none">
        <p id="latitude-aprtmnt">{{ $apartment->latitude }}</p>
        <p id="longitude-aprtmnt">{{ $apartment->longitude }}</p>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
    @vite('resources/js/map-marker.js')
@endsection
