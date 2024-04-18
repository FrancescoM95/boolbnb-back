@extends('layouts.app')

@section('content')
    <h1>Ciao</h1>
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{ $apartment->title }}</li>
            <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-small">AO</a>
        @endforeach
    </ul>
@endsection
