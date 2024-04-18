@extends('layouts.app')

@section('content')
    <h1>Ciao</h1>
    <a href="{{ route('admin.apartments.create') }}" class="btn btn-success">Nuovo</a>
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{ $apartment->title }}</li>
            <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-small primary">Visualizza
                singolo</a>
            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-small warning">Modifica</a>
        @endforeach
    </ul>
@endsection
