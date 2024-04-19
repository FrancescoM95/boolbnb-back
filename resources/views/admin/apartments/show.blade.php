@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}
{{-- @dd($apartment) --}}
@section('content')
    <div class="container">
        <header>
            <h1 class="text-center py-3 m-0">{{ $apartment->title }}</h1>
        </header>
        {{-- immagine + location --}}
        <section id="eye-catcher" class="pb-3 row justify-content-center">
            <div class="pb-3 col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7">
                <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->title }}" class="img-fluid rounded">
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 text-center justify-content-center">
                <div>
                    <p class="m-0">{{ $apartment->address }}</p>
                    <p class="m-0"><a href="https://www.google.it/maps/preview" target="blank">Trova su mappa!</a></p>
                </div>
                {{-- bottone modifica / elimina --}}
                @if ($apartment->user_id == Auth::user()->id)
                    <div class="d-flex justify-content-evenly align-items-center">
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-secondary"><i
                                class="fas fa-pencil me-2 d-none d-sm-inline"></i>Modifica</a>
                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                                <i class="fas fa-trash me-2 d-none d-sm-inline" data-bs-toggle="modal"
                                    data-bs-target="#modal"></i>Elimina</button>
                        </form>
                    </div>
                    {{-- bottone invia messaggio --}}
                @else
                    <div class="d-flex justify-content-evenly align-items-center">
                        <a href="#" class="btn btn-primary"><i
                                class="fas fa-comments me-2 d-none d-sm-inline"></i>Contatta l'host</a>
                    </div>
                @endif
            </div>
        </section>
        {{-- servizi --}}
        <section id="services" class="pb-3">
            <h3 class="text-center pb-3 m-0">Servizi</h3>
            <ul class="row m-0 px-5">
                @foreach ($apartment->services as $service)
                    <li class="list-unstyled col-6 col-md-4 col-lg-3 mb-2"><i class="{{ $service->icon }} me-2"></i>
                        {{ $service->label }}</li>
                @endforeach
            </ul>
        </section>
        {{-- descrizione --}}
        <section id="description" class="pb-3 px-5">
            <h3 class="text-center pb-3 m-0">Descrizione</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quisquam illum at odit, harum iusto
                repudiandae ex in quaerat vitae aliquid. Incidunt labore ipsa similique asperiores. Perferendis quibusdam
                dignissimos deleniti?</p>
        </section>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
