@extends('layouts.app')

@section('content')
    <h1>Modifichiamo un vecchio apartment</h1>
    @foreach ($services as $service)
        <p>{{ $service->label }}</p>
    @endforeach

    <h3>Servizi già correlati</h3>
    @foreach ($apartment->services as $service)
        <p>{{ $service->label }}</p>
    @endforeach
@endsection
