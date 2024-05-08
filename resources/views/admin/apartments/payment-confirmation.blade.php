@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center align-items-center flex-column gap-3">
        <h1 class="text-center">Conferma del pagamento</h1>
        <h5 class="text-center">Hai sponsorizzato {{ $apartment->title }} per {{ $sponsorship->duration }} ore</h5>
        <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">Torna alla Index</a>
    </div>
@endsection
