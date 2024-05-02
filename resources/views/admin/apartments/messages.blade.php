@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messaggi per {{ $apartment->title }}</h1>

        @foreach ($messages as $message)
            <div class="message">
                <p>Da: {{ $message->name }} {{ $message->surname }}</p>
                <p>Email: {{ $message->email }}</p>
                <p>Testo: {{ $message->text }}</p>
                <p>Data: {{ $message->created_at }}</p>

            </div>
        @endforeach

        {{ $messages->links() }}
    </div>
@endsection
