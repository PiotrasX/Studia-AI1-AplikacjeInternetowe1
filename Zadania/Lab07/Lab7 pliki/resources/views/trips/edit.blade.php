@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj dane wycieczki'])

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Edytuj dane wycieczki</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('trips.update', $trip->id) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text"
                            class="form-control @if ($errors->first('name')) is-invalid @endif"
                            value="{{ $trip->name }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="continent" class="form-label">Kontynent</label>
                        <input id="continent" name="continent" type="text"
                            class="form-control @if ($errors->first('continent')) is-invalid @endif"
                            value="{{ $trip->continent }}">
                        <div class="invalid-feedback">Nieprawidłowy kontynent!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="period" class="form-label">Czas trwania</label>
                        <input id="period" name="period" type="number"
                            class="form-control @if ($errors->first('period')) is-invalid @endif"
                            value="{{ $trip->period }}" min="1">
                        <div class="invalid-feedback">Nieprawidłowy czas trwania!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Opis</label>
                        <input id="description" name="description" type="text"
                            class="form-control @if ($errors->first('description')) is-invalid @endif"
                            value="{{ $trip->description }}">
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <input id="price" name="price" type="number"
                            class="form-control @if ($errors->first('price')) is-invalid @endif"
                            value="{{ $trip->price }}" min="1">
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="form-label">IMG</label>
                        <input id="img" name="img" type="text"
                            class="form-control @if ($errors->first('img')) is-invalid @endif"
                            value="{{ $trip->img }}">
                        <div class="invalid-feedback">Nieprawidłowy IMG!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="country_id" class="form-label">Kraj</label>
                        <select id="country_id" name="country_id"
                            class="form-control @error('country_id') is-invalid @enderror">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if ($country->id == old('country_id', $trip->country_id)) selected @endif>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Wyślij">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
