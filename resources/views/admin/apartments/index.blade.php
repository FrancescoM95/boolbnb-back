@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="py-3">Appartamenti</h1>
            <div>
                <a href="{{ route('admin.apartments.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                    Aggiungi
                    appartamento</a>
                <a href="{{ route('admin.apartments.trash') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                    Cestino</a>
            </div>
        </div>

        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">m²</th>
                    <th scope="col">Stanze</th>
                    <th scope="col">Bagni</th>
                    <th scope="col">Letti</th>
                    <th scope="col">Servizi</th>
                    <th scope="col">Data creazione</th>
                    <th scope="col">Ultima modifica</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apartments as $apartment)
                    <tr>
                        <th scope="row">{{ $apartment->id }}</th>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>{{ $apartment->square_meters }}</td>
                        <td>{{ $apartment->rooms }}</td>
                        <td>{{ $apartment->baths }}</td>
                        <td>{{ $apartment->beds }}</td>
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
                        <td>{{ $apartment->getCreatedAt() }}</td>
                        <td>{{ $apartment->getUpdatedAt() }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST"
                                    id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="far fa-trash-can"></i></button>
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
@endsection

@section('scripts')
    <script>
        const deleteForm = document.getElementById('delete-form');

        deleteForm.addEventListener('submit', e => {
            e.preventDefault();

            const confirmation = confirm('Sei sicuro di voler spostare questo appartamento nel cestino?');

            if (confirmation) deleteForm.submit();
        });
    </script>
@endsection
