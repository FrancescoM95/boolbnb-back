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
                                <label for="apartment">Seleziona l'appartamento da sponsorizzare:</label>
                                <select name="apartment" id="apartment" class="form-control">
                                    @foreach ($apartments as $apartment)
                                        <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="sponsorship" id="sponsorship" class="form-control">
                                    @foreach ($sponsorships as $sponsorship)
                                        <option value="{{ $sponsorship->id }}">{{ $sponsorship->label }}</option>
                                    @endforeach
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
