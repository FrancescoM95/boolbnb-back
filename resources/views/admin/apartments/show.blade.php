@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}

@section('content')
    <div class="container" id="show">
        <header>
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
                <div id="description" class="d-none d-lg-block col-lg-4">
                    <h3 class="text-center pb-1 mb-2 bottom-border">Descrizione</h3>
                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quisquam illum at
                        odit, harum iusto
                        repudiandae ex in quaerat vitae aliquid. Incidunt labore ipsa similique asperiores. Perferendis
                        quibusdam
                        dignissimos deleniti? Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit magni,
                        assumenda
                        veniam nemo totam nulla esse ea quam labore, animi accusamus ut sed aspernatur fugiat voluptatum
                        reiciendis
                        necessitatibus mollitia! Alias.Omnis quisquam laudantium dicta, ab molestiae quis modi perspiciatis
                        veniam
                        laboriosam? Numquam itaque eligendi, modi doloribus deleniti necessitatibus ullam deserunt ipsam
                        omnis totam
                        sit, veniam, enim voluptate quasi tempore corrupti!</p>
                </div>
            </div>
            {{-- bottone indietro --}}
            <div class="d-flex justify-content-evenly pb-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i
                        class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
                {{-- bottone modifica / elimina --}}
                @if ($apartment->user_id == Auth::user()->id)
                    <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-pencil me-2 d-none d-sm-inline"></i>Modifica</a>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST"
                        class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-trash me-2 d-none d-sm-inline" data-bs-toggle="modal"
                                data-bs-target="#modal"></i>Elimina</button>
                    </form>
                    {{-- bottone invia messaggio --}}
                @else
                    <a href="#" class="btn btn-primary"><i
                            class="fas fa-comments me-2 d-none d-sm-inline"></i>Contatta
                        l'host</a>
                @endif
            </div>
            <div class="row justify-content-center text-center flex-column">
                <p class="m-0">{{ $apartment->address }}</p>
                <p class="m-0"><a href="https://www.google.it/maps/preview" target="blank">Trova su mappa!</a></p>
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
            <h3 class="text-center pb-1 mb-2 bottom-border">Descrizione</h3>
            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quisquam illum at odit, harum
                iusto
                repudiandae ex in quaerat vitae aliquid. Incidunt labore ipsa similique asperiores. Perferendis quibusdam
                dignissimos deleniti? Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit magni, assumenda
                veniam nemo totam nulla esse ea quam labore, animi accusamus ut sed aspernatur fugiat voluptatum reiciendis
                necessitatibus mollitia! Alias.Omnis quisquam laudantium dicta, ab molestiae quis modi perspiciatis veniam
                laboriosam? Numquam itaque eligendi, modi doloribus deleniti necessitatibus ullam deserunt ipsam omnis totam
                sit, veniam, enim voluptate quasi tempore corrupti!</p>
        </section>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
