<!-- sponsorizza.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sponsorizza Appartamento</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.sponsorship.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="appartamento">Seleziona l'appartamento da sponsorizzare:</label>
                                <select name="appartamento" id="appartamento" class="form-control">
                                    @foreach ($apartments as $apartment)
                                        <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pacchetto">Seleziona il pacchetto promozionale:</label>
                                <select name="pacchetto" id="pacchetto" class="form-control">
                                    <option value="1">€2.99 per 24 ore</option>
                                    <option value="2">€5.99 per 72 ore</option>
                                    <option value="3">€9.99 per 144 ore</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sponsorizza</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
