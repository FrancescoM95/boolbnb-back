@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Messaggi per {{ $apartment->title }}</h1>

        <div class="message-list">
            @foreach ($messages as $message)
                <div class="message-card mb-4">
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
                </div>
            @endforeach
        </div>
    </div>
@endsection
