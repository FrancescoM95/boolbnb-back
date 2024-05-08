@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h1 class="py-3">Lista Appartamenti</h1>
            </div>
            <div class="d-flex gap-2 justify-content-between align-items-center">
                <div>
                    <a href="{{ route('admin.apartments.create') }}" class="btn btn-create text-light">
                        Nuovo appartamento
                        <span class="button-border"></span>
                    </a>
                </div>
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
                    <th scope="col" class="col-1 thl">Pubblico</th>
                    <th scope="col" class="col-2">Cover</th>
                    <th scope="col" class="col-6">Info</th>
                    <th scope="col" class="col-2 dispnone-md-col">Statistiche</th>
                    <th scope="col" class="col-1 dispnone-md-col">Messaggi</th>
                    <th scope="col" class="col-auto thr"></th>
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
                                @if ($apartment->sponsorships->isNotEmpty())
                                    <span class="badge"><i class="fas fa-crown"></i> <span class="dispnone-md-col">
                                            Sponsorizzato</span></span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div>
                                <i class="fas fa-house-chimney color-blue"></i>
                                {{ $apartment->title }}
                            </div>
                            <div>
                                <i class="fas fa-location-dot text-danger"></i>
                                {{ $apartment->address }}
                                <hr>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="d-flex gap-1 align-items-center">
                                    <i class="fas fa-door-closed color-blue"></i> <span
                                        class="dispnone-lg-col">Stanze:</span>
                                    {{ $apartment->rooms }}
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <i class="fas fa-bed color-blue"></i> <span class="dispnone-lg-col">Letti:</span>
                                    {{ $apartment->baths }}
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <i class="fas fa-toilet color-blue"></i> <span class="dispnone-lg-col">Bagni:</span>
                                    {{ $apartment->beds }}
                                </div>
                            </div>
                            <div class="d-flex gap-1 align-items-center">
                                <i class="fas fa-ruler-combined color-blue"></i> m²: {{ $apartment->square_meters }}
                            </div>
                            <hr>
                            @forelse ($apartment->services as $service)
                                <span class="p-1 mb-1">
                                    <i class="{{ $service->icon }} color-blue"></i>

                                </span>
                            @empty
                                <span class="badge rounded-pill text-bg-danger mb-1">
                                    <i class="fa-solid fa-ban fa-xl"></i>
                                </span>
                            @endforelse
                        </td>

                        <td class="dispnone-md-col">
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <a href="{{ route('admin.apartments.statistics', $apartment->id) }}"
                                        class="learn-more">
                                        <span class="circle" aria-hidden="true">
                                            <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text">
                                            Statistiche
                                            <i class="fa-solid fa-chart-line fa-xl"></i></span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('admin.sponsorship.show', ['apartment_id' => $apartment->id]) }}"
                                        class="btn-premium">
                                        <svg viewBox="0 0 576 512" height="1em" class="logoIcon">
                                            <path
                                                d="M309 106c11.4-7 19-19.7 19-34c0-22.1-17.9-40-40-40s-40 17.9-40 40c0 14.4 7.6 27 19 34L209.7 220.6c-9.1 18.2-32.7 23.4-48.6 10.7L72 160c5-6.7 8-15 8-24c0-22.1-17.9-40-40-40S0 113.9 0 136s17.9 40 40 40c.2 0 .5 0 .7 0L86.4 427.4c5.5 30.4 32 52.6 63 52.6H426.6c30.9 0 57.4-22.1 63-52.6L535.3 176c.2 0 .5 0 .7 0c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40c0 9 3 17.3 8 24l-89.1 71.3c-15.9 12.7-39.5 7.5-48.6-10.7L309 106z">
                                            </path>
                                        </svg>
                                        SPONSORIZZA
                                    </a>
                                </div>
                                <div>

                                    @foreach ($apartment->sponsorships as $sponsorship)
                                        <p class="text-sm">Scadenza sponsorizzazione:
                                            {{ Carbon\Carbon::parse($sponsorship->pivot->expiration)->format('d/m/Y H:i') }}
                                        </p>
                                    @endforeach
                                </div>

                            </div>


                        </td>

                        <td class="dispnone-md-col">
                            <a href="{{ route('admin.messages.index', $apartment->id) }}" class="btn btn-primary messages">
                                <svg class="svg-icon" fill="none" height="22" viewBox="0 0 20 20" width="22"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g stroke="#fff" stroke-linecap="round" stroke-width="1.5">
                                        <path d="m6.66669 6.66667h6.66671"></path>
                                        <path clip-rule="evenodd"
                                            d="m3.33331 5.00001c0-.92047.74619-1.66667 1.66667-1.66667h10.00002c.9205 0 1.6666.7462 1.6666 1.66667v6.66669c0 .9205-.7461 1.6666-1.6666 1.6666h-4.8274c-.1105 0-.21654.044-.29462.122l-2.50004 2.5c-.26249.2625-.71129.0766-.71129-.2945v-1.9108c0-.2301-.18655-.4167-.41667-.4167h-1.25c-.92048 0-1.66667-.7461-1.66667-1.6666z"
                                            fill-rule="evenodd"></path>
                                        <path d="m6.66669 10h2.5"></path>
                                    </g>
                                </svg>
                                <span class="lable">
                                    {{ $apartment->message_count }}
                                </span>
                            </a>
                        </td>


                        <td>
                            <div class="dropdown-center">
                                <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="services_button">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <div class="dropdown-menu w-100 p-2 action-dropdown">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                            class="btn btn-sm btn-info text-white">
                                            <i class="far fa-eye"></i>
                                            Dettagli
                                        </a>
                                        <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fa-solid fa-pencil"></i> Modifica
                                        </a>
                                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                            method="POST" class="delete-form w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger w-100" data-bs-toggle="modal"
                                                data-bs-target="#modal">
                                                <i class="far fa-trash-can"></i> Elimina
                                            </button>
                                        </form>
                                        <div class="flex-column gap-2" id="dropdown-buttons-box">
                                            <a href="{{ route('admin.sponsorship.show', ['apartment_id' => $apartment->id]) }}"
                                                class="btn btn-sm text-white btn-warning">
                                                <i class="fa-solid fa-crown"></i>
                                                Sonsorizza
                                            </a>
                                            <a href="{{ route('admin.apartments.statistics', $apartment->id) }}"
                                                class="btn btn-sm btn-success text-white statistics-button">
                                                <i class="fa-solid fa-chart-line"></i>
                                                Statistiche
                                            </a>
                                            <a href="{{ route('admin.messages.index', $apartment->id) }}"
                                                class="btn btn-sm btn-primary messages-button">
                                                <i class="fa-regular fa-message"></i>
                                                Messaggi
                                                <span class="lable">{{ $apartment->message_count }}</span>
                                            </a>
                                        </div>
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
