@extends('layouts.app')

{{-- @section('title', 'Alloggio') --}}

@section('content')
    <div class="container">
        <h1 class="text-center py-3">{{ $apartment->title }}</h1>
        <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->title }}" class="img-fluid rounded">
        <div class="row row-cols-2 text-center py-3">
            <div>
                <p class="m-0">{{ $apartment->address }}</p>
                <p class="m-0"><a href="https://www.google.it/maps/preview" target="blank">Trova su mappa!</a></p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="btn btn-primary">Contatta l'host</a>
            </div>
        </div>
        {{-- <div>

            <li></li>

        </div> --}}
    </div>
@endsection
