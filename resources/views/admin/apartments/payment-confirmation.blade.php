@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h1>Conferma del pagamento</h1>

{{ $apartment->title }}
{{ $sponsorship->label }}</li>

<a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">Torna alla Index</a>
    
</div>
@endsection


