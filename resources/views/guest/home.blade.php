@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container py-5">
            <div class="home-bg p-3">
                <h1 class="text-center"><img src="{{ Vite::asset('resources/img/Boolbnb-logo-nobg.png') }}" alt="Logo">
                </h1>

                <p class="fw-bold text-center mb-5">
                    Che tu sia un viaggiatore in cerca di una sistemazione confortevole o un ospite desideroso di
                    condividere la
                    tua casa con il mondo, BoolbnB è qui per te.
                </p>

                <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                    <a class="btn-donate" href="{{ route('login') }}">
                        Log-in
                    </a>

                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <p class="fs-6">Non sei ancora registrato?</p>

                        @if (Route::has('register'))
                            <a class="btn-donate" href="{{ route('register') }}">Crea nuovo account</a>
                        @endif
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
