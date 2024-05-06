@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <form method="POST" id="payment-form" action="{{ route('admin.sponsorship.submit') }}">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="apartment">Seleziona l'appartamento da sponsorizzare:</label>
                    <select name="apartment" id="apartment" class="form-control">
                        @foreach ($apartments as $apartment)
                            <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($sponsorships as $s)
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div class="spons">
                        <label for="{{ $s->id }}" role="button" class="sponsor-card card-{{ $s->label }} content">
                            <span class="pricing">
                                <span>
                                    {{ $s->duration }}<small>ore</small>
                                </span>
                            </span>
                            <h2 class="title">{{ $s->label }}</h2>
                            <div class="price">{{ $s->fee }}</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at
                                posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                            </div>
                            <div class="btn btn-donate btn-spons mt-2 text-light">
                                Compra ora
                            </div>
                        </label>
                        <input type="radio" class="d-none" id="{{ $s->id }}" name="sponsorship"
                        value="{{ $s->id }}">
                    </div>
                </div>
                @endforeach
                <div id="dropin-container"></div>
                <button type="submit" id="submit-button" class="btn btn-primary">Paga e Sponsorizza</button>
                <button type="button" id="cancel-button" class="btn btn-secondary">Annulla</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var sponsorCards = document.querySelectorAll('.spons');

    sponsorCards.forEach(function(card) {
        card.addEventListener('click', function() {
            sponsorCards.forEach(function(c) {
                c.classList.remove('active');
            });
            card.classList.add('active');
        });
    });
    });
    </script>
@endsection

@vite('resources/js/payment.js')


