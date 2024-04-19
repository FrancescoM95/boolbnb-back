@extends('layouts.app')

{{-- @section('title', 'Cestino') --}}

@section('content')
    <div class="container">
        <header class="d-flex align-items-center justify-content-between flex-column py-3">
            <h1 class="m-0">Appartamenti eliminati</h1>
            <div class="d-flex justify-content-between w-100">

                {{-- Back to home --}}
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary d-block">
                    <i class="far fa-hand-point-left me-2"></i>Torna agli appartamenti
                </a>
                <div class="d-flex justify-content-between gap-2">

                    {{-- massive drop --}}
                    <form action="{{ route('admin.apartments.massivedrop') }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-trash me-2"></i>Svuota cestino</a>
                        </button>
                    </form>

                    {{-- massive restore --}}
                    <form action="{{ route('admin.apartments.massiverestore') }}" method="POST" class="restore-form">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-arrows-rotate me-2"></i>Ripristina tutto</a>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <table class="table table-striped table-hover mb-5">
            
            <thead>
                <tr>
                    <th scope="col">
                        Pubblico
                    </th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col" class="text-center">m²</th>
                    <th scope="col" class="text-center">Stanze</th>
                    <th scope="col" class="text-center">Bagni</th>
                    <th scope="col" class="text-center">Letti</th>
                    <th scope="col">Servizi</th>
                    <th scope="col">Ultima modifica</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apartments as $apartment)
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
                        <td class="text-center">{{ $apartment->square_meters }}</td>
                        <td class="text-center">{{ $apartment->rooms }}</td>
                        <td class="text-center">{{ $apartment->baths }}</td>
                        <td class="text-center">{{ $apartment->beds }}</td>
                        <td>
                            @forelse ($apartment->services as $service)
                                <span class="badge rounded-pill text-bg-primary p-2 mb-1">
                                    <i class="{{ $service->icon }} fa-xl"></i>
                                    <span>{{ $service->label }}</span>
                                </span>
                            @empty
                                N.D.
                            @endforelse
                        </td>
                        <td>{{ $apartment->getUpdatedAt() }}</td>
                        <td>

                             {{-- Icona visualizza appartamento --}}
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                </a>

                                {{-- Icona modifica appartamento --}}
                                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="fas fa-pencil"></i>
                                </a>

                                {{-- Pulsante elimina --}}
                                <form action="{{ route('admin.apartments.drop', $apartment->id) }}" method="POST"
                                    id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="far fa-trash-can"></i></button>
                                </form>

                                {{-- Pulsante restore --}}
                                <form action="{{ route('admin.apartments.restore', $apartment->id) }}" method="POST"
                                    class="restore-form">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modal">
                                        <i class="fas fa-arrows-rotate"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">
                            <h3 class="text-center">Non hai inserito nessun appartamento.</h3>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
