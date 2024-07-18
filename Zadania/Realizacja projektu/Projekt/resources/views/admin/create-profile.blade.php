@include('shared.html')

@include('shared.head', ['pageTitle' => 'Tworzenie profilu nauczania'])

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
                <h1>Stwórz nowy profil nauczania</h1>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <form method="POST" action="{{ route('admin.profile.createAuthenticate') }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mt-4 mb-2 text-center">
                        <h3>Ogólne informacje</h3>
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name') }}">
                        @if ($errors->has('name') && empty(old('name')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="subject_extended1" class="form-label">Przedmiot rozszerzony 1</label>
                        <select id="subject_extended1" name="subject_extended1"
                            class="form-control form-select {{ $errors->has('subject_extended1') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz przedmiot</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->name }}"
                                    {{ old('subject_extended1') == $subject->name ? 'selected' : '' }}>
                                    {{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('subject_extended1') && empty(old('subject_extended1')))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="hours_subject_extended1" class="form-label">Liczba godzin przedmiotu rozszerzonego
                            1</label>
                        <input id="hours_subject_extended1" name="hours_subject_extended1" type="range" min="10"
                            max="60" step="1"
                            class="form-control {{ $errors->has('hours_subject_extended1') ? 'is-invalid' : '' }}"
                            value="{{ old('hours_subject_extended1', 30) }}"
                            oninput="document.getElementById('hours_subject_extended1_output').value = this.value">
                        <output id="hours_subject_extended1_output">{{ old('hours_subject_extended1', 30) }}</output>
                        @if ($errors->has('hours_subject_extended1') && empty(old('hours_subject_extended1')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="subject_extended2" class="form-label">Przedmiot rozszerzony 2</label>
                        <select id="subject_extended2" name="subject_extended2"
                            class="form-control form-select {{ $errors->has('subject_extended2') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz przedmiot</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->name }}"
                                    {{ old('subject_extended2') == $subject->name ? 'selected' : '' }}>
                                    {{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('subject_extended2') && empty(old('subject_extended2')))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="hours_subject_extended2" class="form-label">Liczba godzin przedmiotu rozszerzonego
                            2</label>
                        <input id="hours_subject_extended2" name="hours_subject_extended2" type="range" min="10"
                            max="60" step="1"
                            class="form-control {{ $errors->has('hours_subject_extended2') ? 'is-invalid' : '' }}"
                            value="{{ old('hours_subject_extended2', 30) }}"
                            oninput="document.getElementById('hours_subject_extended2_output').value = this.value">
                        <output id="hours_subject_extended2_output">{{ old('hours_subject_extended2', 30) }}</output>
                        @if ($errors->has('hours_subject_extended2') && empty(old('hours_subject_extended2')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="subject_extended3" class="form-label">Przedmiot rozszerzony 3</label>
                        <select id="subject_extended3" name="subject_extended3"
                            class="form-control form-select {{ $errors->has('subject_extended3') ? 'is-invalid' : '' }}">
                            <option value="">Wybierz przedmiot</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->name }}"
                                    {{ old('subject_extended3') == $subject->name ? 'selected' : '' }}>
                                    {{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('subject_extended3') && empty(old('subject_extended3')))
                            <div class="invalid-feedback">Wybierz to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="hours_subject_extended3" class="form-label">Liczba godzin przedmiotu rozszerzonego
                            3</label>
                        <input id="hours_subject_extended3" name="hours_subject_extended3" type="range" min="10"
                            max="60" step="1"
                            class="form-control {{ $errors->has('hours_subject_extended3') ? 'is-invalid' : '' }}"
                            value="{{ old('hours_subject_extended3', 30) }}"
                            oninput="document.getElementById('hours_subject_extended3_output').value = this.value">
                        <output id="hours_subject_extended3_output">{{ old('hours_subject_extended3', 30) }}</output>
                        @if ($errors->has('hours_subject_extended3') && empty(old('hours_subject_extended3')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="number_of_seats" class="form-label">Liczba miejsc</label>
                        <input id="number_of_seats" name="number_of_seats" type="range" min="1"
                            max="15" step="1"
                            class="form-control {{ $errors->has('number_of_seats') ? 'is-invalid' : '' }}"
                            value="{{ old('number_of_seats', 3) }}"
                            oninput="document.getElementById('number_of_seats_output').value = this.value">
                        <output id="number_of_seats_output">{{ old('number_of_seats', 3) }}</output>
                        @if ($errors->has('number_of_seats') && empty(old('number_of_seats')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="entry_fee" class="form-label">Wpisowe</label>
                        <div class="input-group">
                            <input id="entry_fee" name="entry_fee" type="number" min="1" max="2500"
                                step="1"
                                class="form-control {{ $errors->has('entry_fee') ? 'is-invalid' : '' }}"
                                value="{{ old('entry_fee', 750) }}">
                            <span class="input-group-text">PLN</span>
                        </div>
                        @if ($errors->has('entry_fee') && empty(old('entry_fee')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Wagi przedmiotów</h3>
                    </div>
                    @php
                        $subjectLabels = [
                            'math' => 'Matematyka',
                            'polish_language' => 'Język polski',
                            'english_language' => 'Język angielski',
                            'biology' => 'Biologia',
                            'chemistry' => 'Chemia',
                            'physics' => 'Fizyka',
                            'geography' => 'Geografia',
                            'history' => 'Historia',
                        ];
                    @endphp
                    @foreach (['math', 'polish_language', 'english_language', 'biology', 'chemistry', 'physics', 'geography', 'history'] as $subject)
                        <div class="form-group mb-3 card card-bg-color">
                            <label for="weight_{{ $subject }}"
                                class="form-label">{{ $subjectLabels[$subject] }}</label>
                            <input id="weight_{{ $subject }}" name="weight_{{ $subject }}" type="range"
                                min="0.00" max="1.00" step="0.01"
                                class="form-control {{ $errors->has('weight_' . $subject) ? 'is-invalid' : '' }}"
                                value="{{ old('weight_' . $subject, 0.25) }}"
                                oninput="document.getElementById('weight_{{ $subject }}_output').value = this.value">
                            <output
                                id="weight_{{ $subject }}_output">{{ old('weight_' . $subject, 0.25) }}</output>
                            @if ($errors->has('weight_' . $subject) && empty(old('weight_' . $subject)))
                                <div class="invalid-feedback">Uzupełnij to pole!</div>
                            @endif
                        </div>
                    @endforeach
                    <div class="row mt-4 mb-2 pt-4 text-center">
                        <h3>Zdjęcie profilu</h3>
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
                        <button class="btn btn-danger color-after" type="submit">Stwórz profil</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
