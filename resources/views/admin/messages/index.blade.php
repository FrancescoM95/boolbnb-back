@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3 text-center">Messaggi per {{ $apartment->title }}</h1>

        <div class="message-list">
            <table class="table table-striped table-hover my-3">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
                    <a href="#" class="btn btn-warning"><i
                            class="fa-solid fa-envelopes-bulk me-2 d-none d-sm-inline"></i>Archiviati</a>
                </div>
                <thead>
                    <tr>
                        <th scope="col" class="col-2">Nome e Cognome</th>
                        <th scope="col" class="col-2">Email</th>
                        <th scope="col" class="col-3">Messaggio</th>
                        <th scope="col" class="col-2">Data</th>
                        <th scope="col" class="col-1">Visualizzato</th>
                        <th scope="col" class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- per ogni messaggio riempi riga --}}
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->name }} {{ $message->surname }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->getAbstract($message->text) }}{{ strlen($message->text) > 20 ? ' [...]' : '' }}
                            </td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.messages.read', $message->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="btn btn-sm {{ $message->is_read ? 'btn-secondary' : 'btn-success' }}">{{ $message->is_read ? 'Letto' : 'Da leggere' }}</button>
                                </form>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.messages.show', [$apartment->id, $message->id]) }}"
                                    class="btn btn-sm btn-primary" title="Dettagli"><i class="far fa-eye"></i></a>
                                <form action="{{ route('admin.messages.destroy', [$message->id, $apartment->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-warning" title="Archivia"><i
                                            class="fa-solid fa-envelopes-bulk"></i></button>
                                </form>
                            </td>
                            {{-- <div class="message-card mb-4">
                                <div class="message-header">
                                    <h3>{{ $message->name }} {{ $message->surname }}</h3>
                                    <span class="message-date">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="message-body">
                                    <p class="mb-2"><strong>Email:</strong> {{ $message->email }}</p>
                                    <p class="mb-0"><strong>Testo:</strong> {{ $message->text }}</p>
                                </div>
                                <div class="d-flex mt-5 text-light">
                                    <a href="mailto:{{ $message->email }}" class="btn btn-donate">
                                        Invia email <i class="fa-solid fa-envelope"></i>
                                    </a>
                                </div>
                            </div> --}}
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
