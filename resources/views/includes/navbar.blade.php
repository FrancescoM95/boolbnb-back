<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="">
                <img src="{{ Vite::asset('resources/img/boolbnb-logo.png') }}" alt="Logo" style="height: 50px">
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    {{-- Se l'utente è loggato va alla homepage di Vue --}}
                    @auth
                        <a class="nav-link @if (Route::is('*home')) active @endif"
                            href="{{ env('VUE_HOME_URL') }}">{{ __('Home') }}
                        </a>
                        {{-- Altrimenti va alla pagina per la registrazione/login di Laravel --}}
                    @else
                        <a class="nav-link @if (Route::is('*home')) active @endif"
                            href="{{ url('/') }}">{{ __('Home') }}
                        </a>
                    @endauth
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if (Request::is('admin/apartments*') && !Request::is('admin/apartments/trash*') && !Route::is('admin.sponsorship.show')) active @endif"
                            href="{{ route('admin.apartments.index') }}">I miei appartamenti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::is('admin.sponsorship.show')) active @endif"
                            href="{{ route('admin.sponsorship.show') }}">Sponsorizza
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::is('admin.apartments.trash')) active @endif"
                            href="{{ route('admin.apartments.trash') }}">Cestino
                        </a>
                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-center w-100" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item"
                                href="{{ url('admin/apartments') }}">{{ __('I miei appartamenti') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profilo') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Disconnetti') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
