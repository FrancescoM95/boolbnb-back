@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <form method="POST" id="payment-form" action="{{ route('admin.sponsorship.submit') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-12 my-5">
                        <div class="form-group px-4">
                            <label for="apartment">Seleziona l'appartamento da sponsorizzare:</label>
                            <select name="apartment" id="apartment" class="form-control mt-2">
                                @foreach ($apartments as $apartment)
                                    <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @foreach ($sponsorships as $s)
                        <div class="col-12 col-md-4 d-flex justify-content-center">
                            <div class="spons" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <label for="{{ $s->id }}" role="button"
                                    class="sponsor-card card-{{ $s->label }} content">
                                    <span class="pricing">
                                        <span>
                                            {{ $s->duration }}<small>ore</small>
                                        </span>
                                    </span>
                                    <h2 class="title">{{ $s->label }}</h2>
                                    <div class="price">{{ $s->fee }}€</div>
                                    <div class="description">
                                        Metti in evidenza il tuo appartamento con il pacchetto {{ $s->label }} per
                                        <strong>{{ $s->duration }}</strong> ore a soli
                                        <strong>{{ $s->fee }}€</strong>
                                    </div>
                                </label>
                                <input type="radio" class="d-none" id="{{ $s->id }}" name="sponsorship"
                                    value="{{ $s->id }}">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

    </div>
    {{-- Modale Braintree --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Procedi all'acquisto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="selected-info"></div>
                    <div id="dropin-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit-button" class="btn btn-primary">Sponsorizza</button>
                    <button type="button" id="cancel-button" class="btn btn-secondary">Annulla</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
@endsection

{{-- Braintree e Card effect --}}
@vite('resources/js/sponsorship_page.js')
