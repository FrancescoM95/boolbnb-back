@extends('layouts.app')

@section('content')
    <h1>Ciao</h1>
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{ $apartment->title }}</li>
        @endforeach
    </ul>
@endsection
