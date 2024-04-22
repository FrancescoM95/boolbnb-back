@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex gap-3 align-items-center">
                <h1 class="py-3">Lista Appartamenti</h1>

                <a href="{{ route('admin.apartments.create') }}" class="btn cssbuttons-io-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg>
                    <span></span>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.apartments.trash') }}" class="btn btn-trash">
                    <svg viewBox="0 0 448 512" class="svgIcon">
                        <path
                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>

        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th scope="col" class="col-1">Pubblico</th>
                    <th scope="col" class="col-2">Cover</th>
                    <th scope="col" class="col-4">Info</th>
                    <th scope="col" class="col-5">Servizi</th>
                    <th scope="col" class="col-auto"></th>
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
                                <hr>
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
                                <span class="badge rounded-pill text-bg-secondary p-2 mb-1">
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
                            <div class="dropdown-center">
                                <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="services_button">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <div class="dropdown-menu w-100 p-2">
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
                                            <button class="btn btn-sm btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modal">
                                                <i class="far fa-trash-can"></i>
                                                Elimina
                                            </button>
                                        </form>
                                    </div>
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


        // Modale eliminazione appartamento
        const deleteForm = document.querySelectorAll('.delete-form');
        const modal = document.getElementById('modal');
        const modalBody = document.querySelector('.modal-body');
        const modalTitle = document.querySelector('.modal-title');
        const confirmationButton = document.getElementById('modal-confirmation-button');

        let activeForm = null;

        deleteForm.forEach(form => {
        form.addEventListener('submit', e => {
        e.preventDefault();

        activeForm = form;

        confirmationButton.innerText = 'Conferma Eliminazione';
        confirmationButton.className = 'btn btn-danger';
        modalTitle.innerText = 'Elimina appartamento';
        modalBody.innerText = 'Sei sicuro di voler procedere all\'eliminazione?';
         })
        })

        confirmationButton.addEventListener('click', () => {
        if (activeForm) activeForm.submit();
        });

        modal.addEventListener('hidden.bs.modal', () => {
        activeForm = null;
        })

    </script>    
@endsection
