@if ($apartment->exists)
    <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
@endif


@csrf
<section class="container mt-3">
    <div class="row mb-5">

        {{-- * TITOLO --}}
        <div class="col-11">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text"
                    class="form-control @error('title') is-invalid
              @elseif (old('title', '')) is-valid 
            @enderror"
                    id="title" name="title" value="{{ old('title', $apartment->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- * PUBBLICAZIONE --}}
        <div class="col-1">
            <label for="is_visible" class="form-label">Pubblico</label>
            <div class="mb-3">
                <div class="form-check form-switch toggle-switch">
                    <input class="form-check-input toggle-input" type="checkbox" role="switch" id="is_visible"
                        name="is_visible" @if (old('is_visible', $apartment->is_visible)) checked @endif>
                    <label class="form-check-label toggle-label" for="is_visible"></label>
                </div>
            </div>
        </div>

        {{-- * CAMERE --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="rooms" class="form-label">Numero Camere</label>
                <input type="number"
                    class="form-control @error('rooms') is-invalid
              @elseif (old('rooms', '')) is-valid 
            @enderror"
                    id="rooms" name="rooms" value="{{ old('rooms', $apartment->rooms) }}">
                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- * LETTI --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="beds" class="form-label">Numero letti</label>
                <input type="number"
                    class="form-control @error('beds') is-invalid
              @elseif (old('beds', '')) is-valid 
            @enderror"
                    id="beds" name="beds" value="{{ old('beds', $apartment->beds) }}">
                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- * BAGNI --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="baths" class="form-label">Numero Bagni</label>
                <input type="number"
                    class="form-control @error('baths') is-invalid
              @elseif (old('baths', '')) is-valid 
            @enderror"
                    id="baths" name="baths" value="{{ old('baths', $apartment->baths) }}">
                @error('baths')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>



        {{-- * METRI QUADRI --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="square_meters" class="form-label">Mq</label>
                <input type="number"
                    class="form-control @error('square_meters') is-invalid
              @elseif (old('square_meters', '')) is-valid 
            @enderror"
                    id="square_meters" name="square_meters"
                    value="{{ old('square_meters', $apartment->square_meters) }}">
                @error('square_meters')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        {{-- * INDIRIZZO --}}
        <div class="col-12">
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text"
                    class="form-control @error('address') is-invalid
              @elseif (old('address', '')) is-valid @enderror"
                    id="address" name="address" value="{{ old('address', $apartment->address) }}">
                <input type="text" id="latitude" name="latitude" class="d-none">
                <input type="text" id="longitude" name="longitude" class="d-none">
                <ul id="suggestions-list" class="p-2"></ul>
                @error('adress')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- * SERVIZI --}}
        <div class="col-12">
            <div class="mt-3">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="form-check form-check-inline col-3">
                            <label class="check-container d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="{{ "tech-$service->label" }}"
                                    name='services[]' value="{{ $service->id }}"
                                    @if (in_array($service->id, old('services', $prev_service ?? []))) checked @endif>
                                <div class="checkmark"></div>
                                <label class="form-check-label" for="{{ "tech-$service->label" }}" role="button">
                                    <i class="{{ $service->icon }} mx-2"></i>
                                    {{ $service->label }}
                                </label>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            @error('services')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- * IMMAGINE  --}}
        <div class="col-11">
            <div class="my-3">
                <label for="cover_image" class="form-label">Immagine</label>
                <div @class([
                    'form-control',
                    'd-flex',
                    'd-none' => !$apartment->cover_image,
                ]) id='previous-cover_image-field'>

                    <button class="btn btn-outline-secondary w-25 me-1" type="button"
                        id="change-cover_image-button">Cambia
                        Immagine</button>
                    <input type="text" class="form-control"
                        value="{{ old('cover_image', $apartment->cover_image) }}" disabled>
                </div>
                <input type="file"
                    class="form-control @if ($apartment->cover_image) d-none @endif @error('cover_image') is-invalid @elseif (old('cover_image', '')) is-valid @enderror"
                    name='cover_image' id="cover_image">
            </div>
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="form-text">Carica un file immagine</div>
            @enderror
        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <div>
                <img src="{{ $apartment->cover_image ? $apartment->printImage() : 'https://marcolanci.it/boolean/assets/placeholder.png' }}"
                    class="img-fluid" alt="{{ $apartment->cover_image ? $apartment->title : 'preview' }}"
                    id='preview'>
            </div>
        </div>


    </div>

    {{-- * BOTTONI --}}
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary"><i
                class="fa-solid fa-arrow-left me-2"></i>Torna
            indietro</a>
        <div class="align-items-center d-flex gap-2">
            <button class="btn btn-secondary" type="reset" onclick="resetCoverImagePreview()">
                <i class="fa-solid fa-eraser me-2"></i>Svuota i campi
            </button>
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>

        </div>
    </div>
    </div>
</section>
</form>

<script>
    //***RICERCA INDIRIZZI***

    // Input ricerca
    const inputAddressSearch = document.getElementById('address');
    // UL suggerimenti
    const suggestionAddress = document.getElementById('suggestions-list');
    // Input Latitudine
    const latInput = document.getElementById('latitude');
    // Input longitudine
    const lonInput = document.getElementById('longitude');
    // Base Uri
    const baseUri = 'https://api.tomtom.com/search/2/geocode/';


    const searchPlace = addressTerm => {
        // Mostro un loader per il caricamento dei sugeriti
        suggestionAddress.innerHTML =
            '<li class="pe-none"><i class="fas fa-spinner fa-pulse text-danger p-3"></i></li>';
        suggestionAddress.classList.add('show');
        // Handle API throttling
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            fetchApi(addressTerm);
        }, 500);
    }

    const fetchApi = query => {
        if (!query) {
            // Resets
            latInput.value = null;
            lonInput.value = null;
            suggestionAddress.classList.remove('show');
            suggestionAddress.innerHTML = '';
            return;
        }
        // Geocode API Call
        axios.get(baseUri + query + '.json', {
                params: baseParams,
                transformRequest: sanitizeHeaders
            })
            .then(res => {
                // Get Results
                const {
                    results
                } = res.data;
                if (!results.length) return;
                // Lista suggeriti
                suggestionAddress.innerHTML = '';
                results.forEach(result => {
                    // Get Dati indirizzo
                    const place = {
                        address: result.address.freeformAddress,
                        lat: result.position.lat,
                        lon: result.position.lon
                    };
                    // Aggiungo indirizzo ai suggeriti
                    suggestionAddress.innerHTML +=
                        `<li class="suggestions-item py-2" data-lat="${place.lat}" data-lon="${place.lon}">${place.address}</li>`;
                });
            })
            .catch(err => {
                console.log(err);
                // Mostro messaggi di errore
                suggestionAddress.innerHTML =
                    '<li class="text-danger pe-none p-3">Impossibile contattare il server</li>';
            });
    }

    // Api
    const baseParams = {
        key: 'vDGqRtusGtGdJKA6KXnnnRPK44NG2Uwn', // API KEY 
        limit: 5,
        language: 'it-IT',
        countrySet: 'IT'
    };
    const sanitizeHeaders = [(data, headers) => {
        delete headers.common["X-Requested-With"];
        return data
    }];


    // variables
    let timeoutId = null;

    //*** LOGIC ***//
    // Input address @keyup
    inputAddressSearch.addEventListener('keyup', () => {
        // Get Input Value
        const addressTerm = inputAddressSearch.value.trim();
        // Fetch TT API with throttling (bypass "Too many requests" error)
        searchPlace(addressTerm);
    });
    // Handle suggestions visibility
    inputAddressSearch.addEventListener('focusout', () => {
        suggestionAddress.classList.remove('show');
    });
    // Handle suggestions list click
    suggestionAddress.addEventListener('click', (e) => {
        // Get list item clicked
        const suggestion = e.target;
        // Check if is a suggestions list item
        if (!suggestion.classList.contains('suggestions-item')) return
        // Set values
        inputAddressSearch.value = suggestion.innerText;
        latInput.value = suggestion.dataset.lat;
        lonInput.value = suggestion.dataset.lon;

        // Chiudo la lista di indirizzi suggeriti
        suggestionAddress.innerHTML = '';
    });







    // Funzione reset preview
    function resetCoverImagePreview() {
        const preview = document.getElementById('preview');
        preview.src = 'https://marcolanci.it/boolean/assets/placeholder.png';
    }
</script>
