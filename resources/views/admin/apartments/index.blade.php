@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="py-3">Lista Appartamenti</h1>
            <div>
                <a href="{{ route('admin.apartments.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                    Aggiungi appartamento
                </a>
                <a href="{{ route('admin.apartments.trash') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                    Cestino
                </a>
            </div>
        </div>

        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th scope="col">
                        Pubblico
                    </th>
                    <th scope="col">Cover</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Info</th>
                    <th scope="col">Servizi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apartments as $apartment)
                    <tr>
                        <th scope="row">
                            <form action="{{ route('admin.apartments.publish', $apartment->id) }}" method="POST"
                                class="publication-form">
                                @csrf
                                @method('PATCH')
                                <div class="form-check form-switch toggle-switch">
                                    <input class="form-check-input toggle-input" type="checkbox" role="button"
                                        id="{{ 'is_visible-' . $apartment->id }}" name="is_visible"
                                        @if ($apartment->is_visible) checked @endif>
                                    <label for="toggle" class="toggle-label"></label>
                                </div>
                            </form>
                        </th>
                        <td>
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
                        </td>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>
                            <ul>
                                <li><i class="fa-solid fa-ruler-combined me-2"></i> {{ $apartment->square_meters }}</li>
                                <li><i class="fa-solid fa-door-closed me-2"></i> {{ $apartment->rooms }}</li>
                                <li><i class="fa-solid fa-bed me-2"></i> {{ $apartment->baths }}</li>
                                <li><i class="fa-solid fa-bath me-2"></i> {{ $apartment->beds }}</li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="services_button">
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @forelse ($apartment->services as $service)
                                        <span class="badge rounded-pill text-bg-secondary p-2 mb-1">
                                            <i class="{{ $service->icon }} fa-xl"></i>
                                            <span>{{ $service->label }}</span>
                                        </span>
                                    @empty
                                        <span class="badge rounded-pill text-bg-danger p-2 mb-1">
                                            <i class="fa-solid fa-ban fa-xl"></i>
                                        </span>
                                    @endforelse
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="dropdown-center">
                                <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="services_button">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <div class="dropdown-menu w-100">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="far fa-eye"></i>
                                            Dettagli
                                        </a>
                                        <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fas fa-pencil"></i> Modifica
                                        </a>
                                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                            method="POST" class="delete-form w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger w-100">
                                                <i class="far fa-trash-can"></i>
                                                Elimina
                                            </button>
                                        </form>
                                    </div>
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
@endsection

@section('scripts')
    <script>
        const togglePublicationForms = document.querySelectorAll('.publication-form');
        togglePublicationForms.forEach(form => {
            form.addEventListener('click', () => {
                form.submit();
            })
        });


        const deleteForm = document.querySelectorAll('.delete-form');
        deleteForm.forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();
                const confirmation = confirm(
                    'Sei sicuro di voler spostare questo appartamento nel cestino?');
                if (confirmation) deleteForm.submit();
            })
        })
    </script>
@endsection
