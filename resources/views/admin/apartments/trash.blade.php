@extends('layouts.app')

{{-- @section('title', 'Cestino') --}}

@section('content')
    <div class="container">
        <header class="d-flex align-items-center justify-content-between flex-column py-3">
            <h1 class="m-0 mb-4">Appartamenti eliminati</h1>
            <div class="d-flex justify-content-between w-100">

                {{-- Back to home --}}
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary d-block">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="d-none d-md-inline ms-2">Torna agli appartamenti</span>
                </a>
                <div class="d-flex justify-content-between gap-2">

                    {{-- massive drop --}}
                    <form action="{{ route('admin.apartments.massivedrop') }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-trash"></i>
                            <span class="d-none d-md-inline ms-2">Svuota cestino</span>
                        </button>
                    </form>

                    {{-- massive restore --}}
                    <form action="{{ route('admin.apartments.massiverestore') }}" method="POST" class="restore-form">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-arrows-rotate "></i>
                            <span class="d-none d-md-inline ms-2">Ripristina tutto</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        @if ($apartments->count() === 0)
            <div class="text-center">
                <h3>Non ci sono appartamenti.</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-5">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="d-none d-lg-inline">Pubblico</span><span class="d-lg-none"><i
                                        class="fa-regular fa-eye"></i>
                            </th>
                            <th scope="col">
                                <span class="d-none d-lg-inline">Titolo</span><span class="d-lg-none"><i class="fa-solid fa-house"></i></span>
                            </th>
                            <th scope="col">
                                <span class="d-none d-lg-inline">Indirizzo</span><span class="d-lg-none"><i
                                        class="fa-solid fa-map-location-dot"></i></span>
                            </th>
                            <th scope="col" class="text-center">
                                <span class="d-none d-lg-inline">m²</span><span class="d-lg-none"><i
                                        class="fa-solid fa-ruler-combined"></i></span>
                            </th>
                            <th scope="col" class="text-center">
                                <span class="d-none d-lg-inline">Stanze</span><span class="d-lg-none"><i
                                        class="fas fa-door-closed"></i></span>
                            </th>
                            <th scope="col" class="text-center">
                                <span class="d-none d-lg-inline">Bagni</span><span class="d-lg-none"><i
                                        class="fa-solid fa-bath"></i></span>
                            </th>
                            <th scope="col" class="text-center">
                                <span class="d-none d-lg-inline">Letti</span><span class="d-lg-none"><i
                                        class="fa-solid fa-bed"></i></span>
                            </th>
                            <th scope="col">
                                <span class="d-none d-lg-inline">Servizi</span><span class="d-lg-none"><i
                                        class="fas fa-tools"></i></span>
                            </th>
                            <th scope="col" class="d-none d-lg-table-cell">Ultima modifica</th>
                            <th scope="col">
                                <span class="d-none d-lg-inline">Azioni</span><span class="d-lg-none"><i
                                        class="fa-solid fa-gear"></i></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            <tr>
                                <th scope="row">
                                    <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="is_visible"
                                                name="is_visible" @if (old('is_visible', $apartment->is_visible)) checked @endif>
                                        </div>
                                    </form>
                                </th>
                                <td>{{ $apartment->title }}</td>
                                <td>{{ $apartment->address }}</td>
                                <td class="text-center px-0">{{ $apartment->square_meters }}</td>
                                <td class="text-center px-0">{{ $apartment->rooms }}</td>
                                <td class="text-center px-0">{{ $apartment->baths }}</td>
                                <td class="text-center px-0">{{ $apartment->beds }}</td>
                                <td class="px-0">
                                    @forelse ($apartment->services as $service)
                                        <span class="badge rounded-pill text-bg-secondary p-2 mb-1">
                                            <i class="{{ $service->icon }} fa-xl"></i>
                                            <span class="d-none d-md-inline">{{ $service->label }}</span>
                                        </span>
                                    @empty
                                        N.D.
                                    @endforelse
                                </td>
                                <td class="d-none d-lg-table-cell">{{ $apartment->getUpdatedAt() }}</td>
                                <td>

                                    {{-- Icona visualizza appartamento --}}
                                    <div class="d-flex flex-column flex-lg-row gap-1">
                                        <a title="Visualizza" href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                            class="btn btn-sm btn-primary mb-2 d-flex align-items-center justify-content-center" style="width: 30px">
                                            <i class="far fa-eye"></i>
                                        </a>

                                        {{-- Icona modifica appartamento --}}
                                        <a title="Modifica" href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                            class="btn btn-sm btn-secondary mb-2 d-flex align-items-center justify-content-center" style="width: 30px">
                                            <i class="fas fa-pencil"></i>
                                        </a>

                                        {{-- Pulsante elimina --}}
                                        <form title="Elimina" action="{{ route('admin.apartments.drop', $apartment->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal">
                                                <i class="far fa-trash-can"></i>
                                            </button>                                            
                                        </form>

                                        {{-- Pulsante restore --}}
                                        <form title="Ripristina" action="{{ route('admin.apartments.restore', $apartment->id) }}"
                                            method="POST" class="restore-form">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                                                <i class="fas fa-arrows-rotate"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection