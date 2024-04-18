@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}
{{-- @dd($apartment) --}}
@section('content')
    <div class="container">
        <header>
            <h1 class="text-center py-3 m-0">{{ $apartment->title }}</h1>
        </header>
        {{-- immagine + location --}}
        <section id="eye-catcher" class="pb-3">
            <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->title }}" class="img-fluid rounded pb-3">
            <div class="row row-cols-2 text-center">
                <div>
                    <p class="m-0">{{ $apartment->address }}</p>
                    <p class="m-0"><a href="https://www.google.it/maps/preview" target="blank">Trova su mappa!</a></p>
                </div>
                {{-- bottone modifica / elimina --}}
                @if ($apartment->user_id == Auth::user()->id)
                    <div class="d-flex justify-content-evenly align-items-center">
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-secondary"><i
                                class="fas fa-pencil me-2"></i>Modifica</a>
                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash me-2"></i>Elimina</button>
                        </form>
                    </div>
                    {{-- bottone invia messaggio --}}
                @else
                    <div class="d-flex justify-content-evenly align-items-center">
                        <a href="#" class="btn btn-primary">Contatta l'host</a>
                    </div>
                @endif
            </div>
        </section>
        {{-- servizi --}}
        <section id="services" class="pb-3">
            <h3 class="text-center pb-3 m-0">Servizi</h3>
            <ul class="row m-0 px-5">
                @foreach ($apartment->services as $service)
                    <li class="list-unstyled col-6 mb-2 ps-5"><i class="{{ $service->icon }} me-2"></i>
                        {{ $service->label }}</li>
                @endforeach
            </ul>
        </section>
        {{-- descrizione --}}
        <section id="description" class="pb-3">
            <h3 class="text-center pb-3 m-0">Descrizione</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quisquam illum at odit, harum iusto
                repudiandae ex in quaerat vitae aliquid. Incidunt labore ipsa similique asperiores. Perferendis quibusdam
                dignissimos deleniti?</p>
        </section>
    </div>
@endsection
