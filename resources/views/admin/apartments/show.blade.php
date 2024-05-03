@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}

@section('content')
    <div class="container" id="show">
        <header class="mt-3">
            <h1 class="text-center m-0">{{ $apartment->title }}</h1>
        </header>
        {{-- immagine --}}
        <section id="eye-catcher" class="pb-3">
            <div class="mb-3 row justify-content-center">
                <div class="row justify-content-center img-container col-lg-8 overflow-hidden">
                    @php
                        $imageName =
                            'apartment_images/' .
                            $apartment->slug .
                            '.' .
                            pathinfo($apartment->cover_image, PATHINFO_EXTENSION);
                        $imageUrl = asset('storage/' . $imageName);
                    @endphp

                    @if (Storage::disk('public')->exists($imageName))
                        <img src="{{ $imageUrl }}" alt="{{ $apartment->slug }}">
                    @else
                        <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->slug }}">
                    @endif
                </div>
                {{-- descrizione a comparsa in large --}}
                <div id="description" class="d-none d-lg-block col-lg-4 pt-1 ps-4">
                    <h3 class="text-center pb-1 mb-2 bottom-border">Descrizione</h3>
                    <p class="m-0">{{ $apartment->description }}</p>
                </div>
            </div>
            {{-- bottone indietro --}}
            {{-- # {{ url()->previous() }} --}}
            <div class="d-flex justify-content-evenly pb-3">
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
            {{-- Indirizzo con link su mappa --}}
            <div class="row row-cols-1 row-cols-sm-2 justify-content-center row-gap-2">
                <div class="row justify-content-center text-center flex-column">
                    <p class="m-0">{{ $apartment->address }}</p>
                    <p class="m-0"><a href="#apartment-map">Trova su mappa <i class="fa-solid fa-chevron-down"></i></a>
                    </p>
                </div>
                <div class="row justify-content-center text-center flex-column">
                    <p class="m-0">Hai {{ $apartment->message_count }}
                        {{ $apartment->message_count == 1 ? 'messaggio' : 'messaggi' }} da leggere</p>
                    <p class="m-0"><a href="{{ route('admin.messages.index', $apartment->id) }}">Vai all'inbox
                            <i
                                class="fa-solid {{ $apartment->message_count > 0 ? 'fa-envelope-open-text' : 'fa-envelope-circle-check' }}"></i></a>
                    </p>
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
        <section id="description" class="pb-3 d-lg-none">
            <h3 class="text-center pb-1 mb-3 bottom-border">Descrizione</h3>
            <p class="m-0">{{ $apartment->description }}</p>
        </section>
        {{-- mappa --}}
        <section id="apartment-map" class="pb-3">
            <h3 class="text-center pb-1 mb-3 bottom-border">Dove sarai</h3>
            <div id="map-div"></div>
        </section>
        {{-- messaggi --}}
        {{-- <section id="messages" class="pb-3">
            <h3 class="text-center pb-1 mb-3 bottom-border">Inbox messaggi
            </h3>
            @forelse ($apartment->messages as $message)
                <p>{{ $message->name }}</p>
                <p>{{ $message->surname }}</p>
                <p>{{ $message->email }}</p>
                <p>{{ $message->text }}</p>
            @empty
                <p>Non ci sono messaggi al momento...</p>
            @endforelse
        </section> --}}
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
