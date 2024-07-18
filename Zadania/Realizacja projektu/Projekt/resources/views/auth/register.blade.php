@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zarejestruj się'])

<style>
    html[data-bs-theme='light'] .card-bg-color {
        background-color: #e4f1fe;
        padding: 0.625em;
        padding-top: 0.375em;
    }

    html[data-bs-theme='dark'] .card-bg-color {
        background-color: #2b3035;
        padding: 0.625em;
        padding-top: 0.375em;
    }

    .text-color-href {
        color: #dc3545;
    }

    .text-color-href:hover {
        color: #bb2d3b
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">

        <div class="row text-center">
            <div class="col-12 mb-5">
                <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid"
                    style="max-width: 12em; border-radius: 50%">
            </div>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="row text-center mb-3">
                <h1>Zarejestruj się</h1>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <form method="POST" action="{{ route('auth.register.registerAuthenticate') }}" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="row mt-4 mb-2 text-center">
                        <h3>Dane użytkownika</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="first_name" class="form-label">Imię</label>
                        <input id="first_name" name="first_name" type="text"
                            class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                            value="{{ old('first_name') }}">
                        @if ($errors->has('first_name') && empty(old('first_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="last_name" class="form-label">Nazwisko</label>
                        <input id="last_name" name="last_name" type="text"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            value="{{ old('last_name') }}">
                        @if ($errors->has('last_name') && empty(old('last_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="gender" class="form-label">Płeć</label>
                        <select id="gender" name="gender"
                            class="form-control form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz płeć</option>
                            <option value="Mężczyzna" {{ old('gender') == 'Mężczyzna' ? 'selected' : '' }}>Mężczyzna
                            </option>
                            <option value="Kobieta" {{ old('gender') == 'Kobieta' ? 'selected' : '' }}>Kobieta</option>
                        </select>
                        @if ($errors->has('gender') && empty(old('gender')))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="date_of_birth" class="form-label">Data urodzenia</label>
                        <input id="date_of_birth" name="date_of_birth" type="date"
                            class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                            value="{{ old('date_of_birth') }}">
                        @if ($errors->has('date_of_birth') && empty(old('date_of_birth')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="phone_number" class="form-label">Numer telefonu</label>
                        <input id="phone_number" name="phone_number" type="text"
                            class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                            value="{{ old('phone_number') }}">
                        @if ($errors->has('phone_number') && empty(old('phone_number')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="street" class="form-label">Ulica</label>
                        <input id="street" name="street" type="text"
                            class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
                            value="{{ old('street') }}">
                        @if ($errors->has('street') && empty(old('street')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="house_number" class="form-label">Numer domu</label>
                        <input id="house_number" name="house_number" type="text"
                            class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}"
                            value="{{ old('house_number') }}">
                        @if ($errors->has('house_number') && empty(old('house_number')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="zip_code" class="form-label">Kod pocztowy</label>
                        <input id="zip_code" name="zip_code" type="text"
                            class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                            value="{{ old('zip_code') }}">
                        @if ($errors->has('zip_code') && empty(old('zip_code')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="town" class="form-label">Miasto</label>
                        <input id="town" name="town" type="text"
                            class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}"
                            value="{{ old('town') }}">
                        @if ($errors->has('town') && empty(old('town')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="father_name" class="form-label">Imię ojca</label>
                        <input id="father_name" name="father_name" type="text"
                            class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}"
                            value="{{ old('father_name') }}">
                        @if ($errors->has('father_name') && empty(old('father_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="mother_name" class="form-label">Imię matki</label>
                        <input id="mother_name" name="mother_name" type="text"
                            class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}"
                            value="{{ old('mother_name') }}">
                        @if ($errors->has('mother_name') && empty(old('mother_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Dane konta</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}">
                        @if ($errors->has('email') && empty(old('email')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="watchword" class="form-label">Hasło</label>
                        <input id="watchword" name="watchword" type="password"
                            class="form-control {{ $errors->has('watchword') ? 'is-invalid' : '' }}">
                        @if ($errors->has('watchword') && empty(old('watchword')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="watchword_confirmation" class="form-label">Potwierdź hasło</label>
                        <input id="watchword_confirmation" name="watchword_confirmation" type="password"
                            class="form-control {{ $errors->has('watchword') ? 'is-invalid' : '' }}">
                        @if ($errors->has('watchword') && empty(old('watchword_confirmation')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="text-center mt-4 mb-5 pt-2">
                        <button class="btn btn-danger color-after" type="submit">Zarejestruj się</button>
                    </div>
                    <div class="text-center mt-3">
                        <span>Masz już konto?</span>
                        <a
                            href="{{ route('auth.login') }}"class="text-color-href text-decoration-none">Zaloguj się</a>
                        <span>i złóż kandydaturę.</span>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
