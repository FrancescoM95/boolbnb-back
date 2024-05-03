@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3 text-center">Messaggi per {{ $apartment->title }}</h1>
        {{-- indietro e archiviati --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary"><i
                    class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
            <a href="{{ route('admin.messages.trash', $apartment->id) }}" class="btn btn-warning"><i
                    class="fa-solid fa-envelopes-bulk me-2 d-none d-sm-inline"></i>Archiviati</a>
        </div>
        <div class="message-list">
            {{-- tabella --}}
            <table class="table table-striped table-hover my-3">
                <thead>
                    <tr>
                        <th scope="col" class="col-auto">Data</th>
                        <th scope="col" class="col-2">Nome e Cognome</th>
                        <th scope="col" class="col-2">Email</th>
                        <th scope="col" class="col-4">Messaggio</th>
                        <th scope="col" class="col-1">Visualizzato</th>
                        <th scope="col" class="col-auto"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- per ogni messaggio riempi riga --}}
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $message->name }} {{ $message->surname }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->getAbstract($message->text) }}{{ strlen($message->text) > 20 ? ' [...]' : '' }}
                            </td>
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
                                <a href="mailto:{{ $message->email }}" class="btn btn-sm btn-success"
                                    title="Rispondi via email"><i class="fas fa-reply"></i></a>
                                <form action="{{ route('admin.messages.destroy', [$apartment->id, $message->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-warning" title="Archivia"><i
                                            class="fa-solid fa-envelopes-bulk"></i></button>
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
