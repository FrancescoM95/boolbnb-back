@extends('layouts.app')

@section('content')
    <div class="container">        
        <div class="d-flex justify-content-between align-items-center gap-3 align-items-center my-5">
            <h1 class="py-3 ">Appartamenti eliminati</h1>

            {{-- Bottoni --}}
            <div class="d-flex gap-2">
                {{-- Torna agli appartamenti --}}
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary d-block">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="d-none d-md-inline ms-2">Torna agli appartamenti</span>
                </a>
                {{-- Ripristina tutto --}}
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

        {{-- Tabella appartamenti eliminati --}}
        @if ($apartments->isEmpty())
            <h3 class="text-center">Non ci sono appartamenti eliminati.</h3>
        @else
        <table class="table table-striped table-hover mb-5 ">
            <thead>
                <tr>
                    {{-- <th scope="col" class="col-1">Pubblico</th> --}}
                    <th scope="col" class="col-auto d-none d-md-table-cell">Cover</th>
                    <th scope="col" class="col-4">Info</th>
                    <th scope="col" class="col-5">Servizi</th>
                    <th scope="col" class="col-auto"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apartments as $apartment)
                    <tr>
                        {{-- <th scope="row">
                            <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_visible"
                                        name="is_visible" @if (old('is_visible', $apartment->is_visible)) checked @endif>
                                </div>
                            </form>
                        </th> --}}
                        <td class="d-none d-md-table-cell">
                            <div class="img-box">
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
                        </td>
                        <td>
                            <div>
                                <i class="fa-solid fa-house-chimney"></i>
                                {{ $apartment->title }}
                            </div>
                            <div>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $apartment->address }}
                                <hr class="d-md-none">
                            </div>
                            <div class="d-flex gap-3">
                                <div>
                                    <i class="fa-solid fa-door-closed"></i> Stanze:
                                    {{ $apartment->rooms }}
                                </div>
                                <div>
                                    <i class="fa-solid fa-bed"></i> Letti:
                                    {{ $apartment->baths }}
                                </div>
                                <div>
                                    <i class="fa-solid fa-toilet"></i> Bagni:
                                    {{ $apartment->beds }}
                                </div>
                            </div>
                            <div>
                                <i class="fa-solid fa-ruler-combined"></i> m²: {{ $apartment->square_meters }}
                            </div>
                        </td>

                        <td>
                            @forelse ($apartment->services as $service)
                                <span class="badge rounded-pill text-bg-bool p-2 mb-1">
                                    <i class="{{ $service->icon }} fa-xl"></i>
                                    <span>{{ $service->label }}</span>
                                </span>
                            @empty
                                <span class="badge rounded-pill text-bg-danger p-2 mb-1">
                                    <i class="fa-solid fa-ban fa-xl"></i>
                                </span>
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex flex-column flex-lg-row gap-1">
                                {{-- Icona visualizza appartamento --}}
                                {{-- <a title="Visualizza" href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                    class="btn btn-md btn-primary mb-2 d-flex align-items-center justify-content-center"
                                    style="width: 30px">
                                    <i class="far fa-eye"></i>
                                </a> --}}

                                {{-- Icona modifica appartamento --}}
                                {{-- <a title="Modifica" href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                                    class="btn btn-md btn-secondary mb-2 d-flex align-items-center justify-content-center"
                                    style="width: 30px">
                                    <i class="fas fa-pencil"></i>
                                </a> --}}

                                {{-- Pulsante elimina --}}
                                {{-- <form title="Elimina" action="{{ route('admin.apartments.drop', $apartment->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal">
                                        <i class="far fa-trash-can"></i>
                                    </button>                                            
                                </form> --}}

                                {{-- Pulsante restore --}}
                                <form title="Ripristina" action="{{ route('admin.apartments.restore', $apartment->id) }}"
                                    method="POST" class="restore-form">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-md btn-success d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modal" style="width: 30px">
                                        <i class="fas fa-arrows-rotate"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Non ci sono appartamenti eliminati.</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @endif
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
