@extends('layouts.app')

@section('content')
    <div class="registration">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-md-8 pt-5">
                    <div class="card home-bg">
                        <div class="card-header">{{ __('Inserisci i tuoi dati') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- ? NOME --}}
                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Nome') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ? COGNOME --}}
                                <div class="mb-4 row">
                                    <label for="surname"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Cognome') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ old('surname') }}" autocomplete="family-name" autofocus>

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ? DATA DI NASCITA --}}
                                <div class="mb-4 row">
                                    <label for="birth_date"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Data di nascita') }}</label>

                                    <div class="col-md-6">
                                        <input id="birth_date" type="date"
                                            class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                            value="{{ old('birth_date') }}" autocomplete="birth_date">

                                        @error('birth_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ? EMAIL --}}
                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Indirizzo email *') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ? PASSWORD --}}
                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Password *') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ? CONFERMA PASSWORD --}}
                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right text-dark">{{ __('Conferma Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <small class="text-dark"><i>Campi obbligatori *</i></small>

                                {{-- ? BOTTONE REGISTRATI --}}
                                <div class="mb-4 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-donate text-light">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
