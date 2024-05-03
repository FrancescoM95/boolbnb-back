@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-3 text-center">
            <h1>Messaggio da {{ $message->email }}</h1>
            <h3>Relativo ad "{{ $apartment->title }}"</h3>
        </div>

        <section id="message-area" class="mb-3 bg-white rounded p-3">
            <form class="text-center">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome e cognome</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $message->name }} {{ $message->surname }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo mail mittente</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $message->email }}"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Corpo del messaggio</label>
                    <textarea class="form-control" name="text" id="text" rows="3" disabled>{{ $message->text }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Data e ora ricezione</label>
                    <input type="text" class="form-control" id="date" name="date"
                        value="{{ $message->created_at->format('d/m/Y H:i') }}" disabled>
                </div>
            </form>
        </section>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.messages.index', $apartment->id) }}" class="btn btn-secondary"><i
                    class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a>
            <form action="{{ route('admin.messages.destroy', [$message->id, $apartment->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning" title="Archivia"><i class="fa-solid fa-envelopes-bulk"></i>
                    Archivia</button>
            </form>
        </div>
    </div>
@endsection
