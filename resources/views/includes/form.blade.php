@if ($apartment->exists)
    <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
@endif


@csrf
<section class="container mt-3">
    <div class="row mb-5">
        <div class="col-6">
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
        <div class="col-6">
            <div class="mb-3">
                <label for="baths" class="form-label">Numero Bagni</label>
                <input type="number"
                    class="form-control @error('baths') is-invalid
              @elseif (old('baths', '')) is-valid 
            @enderror"
                    id="baths" name="baths" value="{{ old('baths', $apartment->baths) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="beds" class="form-label">Numero letti</label>
                <input type="number"
                    class="form-control @error('beds') is-invalid
              @elseif (old('beds', '')) is-valid 
            @enderror"
                    id="beds" name="beds" value="{{ old('beds', $apartment->beds) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>




        <div class="col-6">
            <div class="mb-3">
                <label for="rooms" class="form-label">Numero Camere</label>
                <input type="number"
                    class="form-control @error('rooms') is-invalid
              @elseif (old('rooms', '')) is-valid 
            @enderror"
                    id="rooms" name="rooms" value="{{ old('rooms', $apartment->rooms) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="square_meters" class="form-label">Mq</label>
                <input type="number"
                    class="form-control @error('square_meters') is-invalid
              @elseif (old('square_meters', '')) is-valid 
            @enderror"
                    id="square_meters" name="square_meters"
                    value="{{ old('square_meters', $apartment->square_meters) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        {{-- Address --}}
        <div class="col-6">
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text"
                    class="form-control @error('address') is-invalid
              @elseif (old('address', '')) is-valid @enderror"
                    id="address" name="address" value="{{ old('address', $apartment->address) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mt-3">
                @foreach ($services as $service)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{ "tech-$service->label" }}"
                            name='services[]' value="{{ $service->id }}"
                            @if (in_array($service->id, old('services', $prev_service ?? []))) checked @endif>
                        <label class="form-check-label" for="{{ "tech-$service->label" }}">{{ $service->label }}<i
                                class="{{ $service->icon }} mx-2"></i></label>
                    </div>
                @endforeach
            </div>
            @error('services')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
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
                <img src="{{ old('cover_image', $apartment->cover_image) ? $apartment->printImage() : 'https://marcolanci.it/boolean/assets/placeholder.png' }}"
                    class="img-fluid" alt="{{ $apartment->cover_image ? $apartment->title : 'preview' }}"
                    id='preview'>
            </div>
        </div>
        <div class="col-6">
            <div class="my-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_visible"
                        name="is_visible" @if (old('is_visible', $apartment->is_visible)) checked @endif>
                    <label class="form-check-label" for="is_visible">Pubblica</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary"><i
                class="fa-solid fa-arrow-left me-2"></i>Torna
            indietro</a>
        <div class="align-items-center d-flex gap-2">
            <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-eraser me-2"></i>Svuota i
                campi</button>
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>

        </div>
    </div>
    </div>
</section>
</form>

<script>
    const addressField = document.getElementById('address');
    const endpoint = 'https://api.tomtom.com/search/2/search/Via%20Giacinto%20De%20Vecchi%2030%20Milano.json?key=HSR09zFiF4jz6GK6FfrL7kKwLJWYYxVA';

    addressField.addEventListener('keyup', () =>{
        const address = addressField.value.trim();
        axios.get(endpoint)
        .then(res => {
            console.log(res.data.result)
        }).catch(err => {
            console.error(err);
        })
    })
</script>
