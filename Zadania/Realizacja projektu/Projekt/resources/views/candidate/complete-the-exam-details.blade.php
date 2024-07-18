@include('shared.html')

@include('shared.head', ['pageTitle' => 'Uzupełnij swoje dane'])

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
                <h1>Uzupełnij swoje dane</h1>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <form method="POST" action="{{ route('candidate.completeTheExamDetailsAuthenticate') }}"
                    class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mt-4 mb-2 text-center">
                        <h3>Wyniki egzaminu</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_math" class="form-label">Matematyka</label>
                        <input id="result_math" name="result_math" type="range" min="0" max="100"
                            step="1" class="form-control {{ $errors->has('result_math') ? 'is-invalid' : '' }}"
                            value="{{ old('result_math', 50) }}"
                            oninput="document.getElementById('result_math_output').value = this.value">
                        <output id="result_math_output">{{ old('result_math', 50) }}</output>
                        @if ($errors->has('result_math') && empty(old('result_math')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_polish_language" class="form-label">Język Polski</label>
                        <input id="result_polish_language" name="result_polish_language" type="range" min="0"
                            max="100" step="1"
                            class="form-control {{ $errors->has('result_polish_language') ? 'is-invalid' : '' }}"
                            value="{{ old('result_polish_language', 50) }}"
                            oninput="document.getElementById('result_polish_language_output').value = this.value">
                        <output id="result_polish_language_output">{{ old('result_polish_language', 50) }}</output>
                        @if ($errors->has('result_polish_language') && empty(old('result_polish_language')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="result_english_language" class="form-label">Język Angielski</label>
                        <input id="result_english_language" name="result_english_language" type="range" min="0"
                            max="100" step="1"
                            class="form-control {{ $errors->has('result_english_language') ? 'is-invalid' : '' }}"
                            value="{{ old('result_english_language', 50) }}"
                            oninput="document.getElementById('result_english_language_output').value = this.value">
                        <output id="result_english_language_output">{{ old('result_english_language', 50) }}</output>
                        @if ($errors->has('result_english_language') && empty(old('result_english_language')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="name_fourth_subject" class="form-label">Nazwa czwartego przedmiotu</label>
                        <select id="name_fourth_subject" name="name_fourth_subject"
                            class="form-control form-select {{ $errors->has('name_fourth_subject') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz przedmiot</option>
                            <option value="Biologia" {{ old('name_fourth_subject') == 'Biologia' ? 'selected' : '' }}>
                                Biologia</option>
                            <option value="Chemia" {{ old('name_fourth_subject') == 'Chemia' ? 'selected' : '' }}>
                                Chemia</option>
                            <option value="Fizyka" {{ old('name_fourth_subject') == 'Fizyka' ? 'selected' : '' }}>
                                Fizyka</option>
                            <option value="Historia" {{ old('name_fourth_subject') == 'Historia' ? 'selected' : '' }}>
                                Historia</option>
                            <option value="Geografia"
                                {{ old('name_fourth_subject') == 'Geografia' ? 'selected' : '' }}>Geografia</option>
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
                            value="{{ old('result_fourth_subject', 30) }}"
                            oninput="document.getElementById('result_fourth_subject_output').value = this.value">
                        <output id="result_fourth_subject_output">{{ old('result_fourth_subject', 30) }}</output>
                        @if ($errors->has('result_fourth_subject') && empty(old('result_fourth_subject')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Zdjęcie kandydata</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="photo" class="form-label">Zdjęcie</label>
                        <div class="input-group mb-2">
                            <input name="photo" type="file"
                                class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo"
                                accept=".jpg, .jpeg, .png">
                            <span class="input-group-text">IMG</span>
                        </div>
                        @if ($errors->has('photo'))
                            <div class="invalid-feedback">Błąd zdjęcia!</div>
                        @endif
                    </div>
                    <div class="text-center mt-4 mb-2 pt-2">
                        <button class="btn btn-danger color-after" type="submit">Uzupełnij dane</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
