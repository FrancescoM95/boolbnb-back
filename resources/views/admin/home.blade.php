@extends('layouts.app')

@section('content')
    <div class="container" id="dashboard">
        <h2 class="fs-4 my-4" id="welcoming">
            Benvenuto {{ $user->name }}
        </h2>
        <div class="row justify-content-center">
            {{-- Aggiungi appartamento --}}
            <div class="col my-1">
                <div class="card card-donate ">
                    <a href="{{ route('admin.apartments.create') }}" class="text-decoration-none text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Aggiungi un appartamento</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            {{-- Visualizza appartamenti caricati --}}
            <div class="col my-1">
                <div class="card card-donate">
                    <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Visualizza gli appartamenti</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>

            {{-- # Sponsorizzazione --}}
            <div class="col my-1">
                <div class="card card-donate">
                    <a href="{{ route('admin.sponsorship.show') }}" class="text-decoration-none text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span class="text-nowrap">Sponsorizza un appartamento</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
