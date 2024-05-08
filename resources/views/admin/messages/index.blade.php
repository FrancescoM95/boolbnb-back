@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3 text-center">Messaggi per {{ $apartment->title }}</h1>
        {{-- indietro e archiviati --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.apartments.show', $apartment->slug) }}" class="btn btn-secondary"><i
                    class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
            <a href="{{ route('admin.messages.trash', $apartment->id) }}" class="btn btn-warning"><i
                    class="fa-solid fa-envelopes-bulk me-2 d-none d-sm-inline"></i>Archiviati</a>
        </div>
        <div class="message-list">
            {{-- tabella --}}
            <table class="table table-striped table-hover my-3">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">Data</th>
                        <th scope="col" class="col-3 d-none d-lg-table-cell">Nome e Cognome</th>
                        <th scope="col" class="col-2">Email</th>
                        <th scope="col" class="col-3 d-none d-lg-table-cell">Messaggio</th>
                        <th scope="col" class="col-1 d-none d-md-table-cell">Visualizzato</th>
                        <th scope="col" class="col-1"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- per ogni messaggio riempi riga --}}
                    @forelse ($messages as $message)
                        <tr>
                            <td class="d-md-none">{{ $message->created_at->format('d/m/Y') }}</td>
                            <td class="d-none d-md-table-cell">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td class="d-none d-lg-table-cell">{{ $message->name }} {{ $message->surname }}</td>
                            <td>{{ $message->email }}</td>
                            <td class="d-none d-lg-table-cell">
                                {{ $message->getAbstract($message->text) }}{{ strlen($message->text) > 20 ? ' [...]' : '' }}
                            </td>
                            <td class="d-md-none">
                                <div class="dropdown-center">
                                    <button class="btn btn-sm btn-secondary m-0" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" id="messages_button">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu p-2 action-dropdown">
                                        <div class="d-flex flex-column gap-2 align-items-stretch">
                                            <form action="{{ route('admin.messages.read', $message->id) }}" method="POST"
                                                class="w-100">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    class="btn btn-sm {{ $message->is_read ? 'btn-secondary' : 'btn-success' }} w-100">{{ $message->is_read ? 'Letto' : 'Da leggere' }}</button>
                                            </form>
                                            <a href="{{ route('admin.messages.show', [$apartment->id, $message->id]) }}"
                                                class="btn btn-sm btn-primary" title="Dettagli"><i
                                                    class="far fa-eye"></i></a>
                                            <a href="mailto:{{ $message->email }}" class="btn btn-sm btn-success"
                                                title="Rispondi via email"><i class="fas fa-reply "></i></a>
                                            <form
                                                action="{{ route('admin.messages.destroy', [$apartment->id, $message->id]) }}"
                                                method="POST" class="w-100 delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-warning w-100" title="Archivia"
                                                    data-bs-toggle="modal" data-bs-target="#modal"><i
                                                        class="fa-solid fa-envelopes-bulk"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <form action="{{ route('admin.messages.read', $message->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="btn btn-sm {{ $message->is_read ? 'btn-secondary' : 'btn-success' }}">{{ $message->is_read ? 'Letto' : 'Da leggere' }}</button>
                                </form>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2 d-none d-md-flex">
                                <a href="{{ route('admin.messages.show', [$apartment->id, $message->id]) }}"
                                    class="btn btn-sm btn-primary" title="Dettagli"><i class="far fa-eye"></i></a>
                                <a href="mailto:{{ $message->email }}" class="btn btn-sm btn-success"
                                    title="Rispondi via email"><i class="fas fa-reply"></i></a>
                                <form action="{{ route('admin.messages.destroy', [$apartment->id, $message->id]) }}"
                                    method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-warning" title="Archivia" data-bs-toggle="modal"
                                        data-bs-target="#modal"><i class="fa-solid fa-envelopes-bulk"></i></button>
                                </form>
                            </td>
                        </tr>
                        {{-- se non ci sono messaggi --}}
                    @empty
                        <tr>
                            <td colspan="12">
                                <h3 class="text-center m-0">Non sono presenti messaggi per questo appartamento</h3>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/messages_alert.js')
@endsection
