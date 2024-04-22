@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Benvenuto {{ $user->name }}
        </h2>
        <div class="row justify-content-center">
            {{-- Aggiungi appartamento --}}
            <div class="col">                
                <div class="card">
                    <a href="{{ route('admin.apartments.create') }}" class="text-decoration-none text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Aggiungi un appartamento</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </div>  
                    </a>                  
                </div>
            </div>
            {{-- Visualizza appartamenti caricati --}}            
            <div class="col">
                <div class="card">
                    <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span>Visualizza i tuoi appartamenti</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </div> 
                    </a>
                </div>
            </div>            
        </div>
    </div>
@endsection
