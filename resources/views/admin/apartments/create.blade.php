@extends('layouts.app')

@section('content')
    <h1>Famo un nuovo apartment</h1>
    @foreach ($services as $service)
        <p>{{ $service->label }}</p>
    @endforeach
@endsection
