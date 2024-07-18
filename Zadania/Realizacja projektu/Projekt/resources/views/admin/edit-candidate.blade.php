@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edycja danych kandydata'])

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
                <h1>Edycja danych kandydata</h1>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <form method="POST" action="{{ route('admin.editCandidateAuthenticate') }}" class="needs-validation"
                    novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="candidate_id" value="{{ $candidate_id }}">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="gender" value="{{ $gender }}">
                    <div class="row mt-4 mb-2 text-center">
                        <h3>Dane użytkownika</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="first_name" class="form-label">Imię</label>
                        <input id="first_name" name="first_name" type="text"
                            class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                            value="{{ old('first_name', $candidate->user->data->first_name ?? '') }}">
                        @if ($errors->has('first_name') && empty(old('first_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="last_name" class="form-label">Nazwisko</label>
                        <input id="last_name" name="last_name" type="text"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            value="{{ old('last_name', $candidate->user->data->last_name ?? '') }}">
                        @if ($errors->has('last_name') && empty(old('last_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="gender" class="form-label">Płeć</label>
                        <select id="gender" name="gender"
                            class="form-control form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz płeć</option>
                            <option value="Mężczyzna"
                                {{ old('gender', $candidate->user->data->gender ?? '') == 'Mężczyzna' ? 'selected' : '' }}>
                                Mężczyzna</option>
                            <option value="Kobieta"
                                {{ old('gender', $candidate->user->data->gender ?? '') == 'Kobieta' ? 'selected' : '' }}>
                                Kobieta</option>
                        </select>
                        @if ($errors->has('gender') && empty(old('gender')))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="date_of_birth" class="form-label">Data urodzenia</label>
                        <input id="date_of_birth" name="date_of_birth" type="date"
                            class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                            value="{{ old('date_of_birth', $dateOfBirth) }}">
                        @if ($errors->has('date_of_birth') && empty(old('date_of_birth')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="phone_number" class="form-label">Numer telefonu</label>
                        <input id="phone_number" name="phone_number_display" type="text" class="form-control"
                            value="{{ old('phone_number', $candidate->user->data->phone_number ?? '') }}" disabled>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="street" class="form-label">Ulica</label>
                        <input id="street" name="street" type="text"
                            class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
                            value="{{ old('street', $candidate->user->data->street ?? '') }}">
                        @if ($errors->has('street') && empty(old('street')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="house_number" class="form-label">Numer domu</label>
                        <input id="house_number" name="house_number" type="text"
                            class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}"
                            value="{{ old('house_number', $candidate->user->data->house_number ?? '') }}">
                        @if ($errors->has('house_number') && empty(old('house_number')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="zip_code" class="form-label">Kod pocztowy</label>
                        <input id="zip_code" name="zip_code" type="text"
                            class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                            value="{{ old('zip_code', $candidate->user->data->zip_code ?? '') }}">
                        @if ($errors->has('zip_code') && empty(old('zip_code')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="town" class="form-label">Miasto</label>
                        <input id="town" name="town" type="text"
                            class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}"
                            value="{{ old('town', $candidate->user->data->town ?? '') }}">
                        @if ($errors->has('town') && empty(old('town')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="father_name" class="form-label">Imię ojca</label>
                        <input id="father_name" name="father_name" type="text"
                            class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}"
                            value="{{ old('father_name', $candidate->user->data->father_name ?? '') }}">
                        @if ($errors->has('father_name') && empty(old('father_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="mother_name" class="form-label">Imię matki</label>
                        <input id="mother_name" name="mother_name" type="text"
                            class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}"
                            value="{{ old('mother_name', $candidate->user->data->mother_name ?? '') }}">
                        @if ($errors->has('mother_name') && empty(old('mother_name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Dane konta</h3>
                    </div>
                    <div class="form-group mb-2 card card-bg-color">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email_display" type="text" class="form-control"
                            value="{{ old('email', $candidate->user->email ?? '') }}" disabled>
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Wyniki egzaminu</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_math" class="form-label">Matematyka</label>
                        <input id="result_math" name="result_math" type="range" min="0" max="100"
                            step="1" class="form-control {{ $errors->has('result_math') ? 'is-invalid' : '' }}"
                            value="{{ old('result_math', $candidate->result_math ?? 50) }}"
                            oninput="document.getElementById('result_math_output').value = this.value">
                        <output
                            id="result_math_output">{{ old('result_math', $candidate->result_math ?? 50) }}</output>
                        @if ($errors->has('result_math') && empty(old('result_math')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_polish_language" class="form-label">Język Polski</label>
                        <input id="result_polish_language" name="result_polish_language" type="range"
                            min="0" max="100" step="1"
                            class="form-control {{ $errors->has('result_polish_language') ? 'is-invalid' : '' }}"
                            value="{{ old('result_polish_language', $candidate->result_polish_language ?? 50) }}"
                            oninput="document.getElementById('result_polish_language_output').value = this.value">
                        <output
                            id="result_polish_language_output">{{ old('result_polish_language', $candidate->result_polish_language ?? 50) }}</output>
                        @if ($errors->has('result_polish_language') && empty(old('result_polish_language')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_english_language" class="form-label">Język Angielski</label>
                        <input id="result_english_language" name="result_english_language" type="range"
                            min="0" max="100" step="1"
                            class="form-control {{ $errors->has('result_english_language') ? 'is-invalid' : '' }}"
                            value="{{ old('result_english_language', $candidate->result_english_language ?? 50) }}"
                            oninput="document.getElementById('result_english_language_output').value = this.value">
                        <output
                            id="result_english_language_output">{{ old('result_english_language', $candidate->result_english_language ?? 50) }}</output>
                        @if ($errors->has('result_english_language') && empty(old('result_english_language')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="name_fourth_subject" class="form-label">Nazwa czwartego przedmiotu</label>
                        <select id="name_fourth_subject" name="name_fourth_subject"
                            class="form-control form-select {{ $errors->has('name_fourth_subject') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz przedmiot</option>
                            <option value="Biologia"
                                {{ old('name_fourth_subject', $candidate->name_fourth_subject ?? '') == 'Biologia' ? 'selected' : '' }}>
                                Biologia</option>
                            <option value="Chemia"
                                {{ old('name_fourth_subject', $candidate->name_fourth_subject ?? '') == 'Chemia' ? 'selected' : '' }}>
                                Chemia</option>
                            <option value="Fizyka"
                                {{ old('name_fourth_subject', $candidate->name_fourth_subject ?? '') == 'Fizyka' ? 'selected' : '' }}>
                                Fizyka</option>
                            <option value="Historia"
                                {{ old('name_fourth_subject', $candidate->name_fourth_subject ?? '') == 'Historia' ? 'selected' : '' }}>
                                Historia</option>
                            <option value="Geografia"
                                {{ old('name_fourth_subject', $candidate->name_fourth_subject ?? '') == 'Geografia' ? 'selected' : '' }}>
                                Geografia</option>
                        </select>
                        @if ($errors->has('name_fourth_subject'))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_fourth_subject" class="form-label">Czwarty przedmiot</label>
                        <input id="result_fourth_subject" name="result_fourth_subject" type="range" min="0"
                            max="100" step="1"
                            class="form-control {{ $errors->has('result_fourth_subject') ? 'is-invalid' : '' }}"
                            value="{{ old('result_fourth_subject', $candidate->result_fourth_subject ?? 30) }}"
                            oninput="document.getElementById('result_fourth_subject_output').value = this.value">
                        <output
                            id="result_fourth_subject_output">{{ old('result_fourth_subject', $candidate->result_fourth_subject ?? 30) }}</output>
                        @if ($errors->has('result_fourth_subject') && empty(old('result_fourth_subject')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Zdjęcie kandydata</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="candidate_photo" class="form-label">Zdjęcie:</label>
                        @if ($candidate->photo !== 'man_photo.png' && $candidate->photo !== 'woman_photo.png')
                            <div class="existing-photo mb-2">
                                <div class="image-entry mb-1">
                                    <img src="{{ asset('storage/img/candidate/' . $candidate->photo) }}"
                                        style="margin-right: 12px;" alt="Zdjęcie kandydata"
                                        class="img-thumbnail col-9 mb-1">
                                    <input type="checkbox" name="remove_candidate_photo" value="1"
                                        {{ old('remove_candidate_photo') == 1 ? 'checked' : '' }}> Usuń
                                </div>
                            </div>
                        @endif
                        <div class="input-group mb-2">
                            <input name="new_candidate_photo" type="file"
                                class="form-control {{ $errors->has('new_candidate_photo') ? 'is-invalid' : '' }}"
                                id="candidate_photo" accept=".jpg, .jpeg, .png">
                            <span class="input-group-text">IMG</span>
                        </div>
                        @if ($errors->has('new_candidate_photo'))
                            <div class="invalid-feedback">Błąd zdjęcia!</div>
                        @endif
                    </div>
                    <div class="text-center mt-4 mb-2 pt-2">
                        <button class="btn btn-danger color-after" type="submit">Edytuj dane</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
