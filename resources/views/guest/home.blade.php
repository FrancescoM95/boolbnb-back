@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container h-100 py-3">
            <div class="home-bg h-100">


                <h1 class="text-center"><img src="{{ Vite::asset('resources/img/boolbnb-logo-nobg.png') }}" alt="Logo">
                </h1>


                <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                    <a class="btn-donate" href="{{ route('login') }}">
                        Accedi
                    </a>

                    <div class="d-flex flex-column justify-content-center align-items-center">

                        @if (Route::has('register'))
                            <a class="btn-donate" href="{{ route('register') }}">Crea nuovo account</a>
                        @endif
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
