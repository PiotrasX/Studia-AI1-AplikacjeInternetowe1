@include('shared.html')

@include('shared.head', ['pageTitle' => 'Profil użytkownika'])

<style>
    html[data-bs-theme='light'] .special-card {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .special-card {
        background-color: #2b3035;
    }

    .text-color-href {
        color: #dc3545;
    }

    .text-color-href:hover {
        color: #bb2d3b
    }

    html[data-bs-theme='light'] .table-div-special {
        background-color: #dee2e6;
    }

    html[data-bs-theme='dark'] .table-div-special {
        background-color: #495057;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="you-account">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Twój profil</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card special-card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            style="padding-bottom: 10px;">
                            <span style="font-size: 24px">
                                {{ $candidate->user->data->first_name }} {{ $candidate->user->data->last_name }}
                            </span>
                            <img src="{{ asset('storage/img/candidate/' . $candidate->photo) }}" class="rounded-circle"
                                width="100" height="100"
                                style="max-width: 100px; max-height: 100px; object-fit: cover;"
                                alt="Zdjęcie użytkownika" loading="lazy" />
                        </div>
                        <div class="card-body row">
                            <div class="col-12 col-md-6">
                                <h5>Twoje dane</h5>
                                <strong>Email:</strong><span> {{ $candidate->user->email }}</span><br>
                                <strong>Numer telefonu:</strong><span>
                                    {{ $candidate->user->data->phone_number }}</span><br>
                                <strong>Adres:</strong><span> {{ $candidate->user->data->street }}
                                    {{ $candidate->user->data->house_number }},
                                    {{ $candidate->user->data->zip_code }}
                                    {{ $candidate->user->data->town }}</span><br>
                                <strong>Imię ojca:</strong><span> {{ $candidate->user->data->father_name }}</span><br>
                                <strong>Imię matki:</strong><span> {{ $candidate->user->data->mother_name }}</span><br>
                                <strong>Stan konta:</strong> {{ $candidate->account_balance }} PLN<br>
                                <div class="card-text col-12 d-flex flex-wrap gap-2 mt-2">
                                    <a href="{{ route('candidate.settings') }}"
                                        class="btn btn-danger color-after">Edytuj
                                        dane</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#topUpModal">Doładuj konto</button>
                                </div>
                                <div class="modal fade" id="topUpModal" tabindex="-1" aria-labelledby="topUpModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('candidate.topUp') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="topUpModalLabel">Doładuj swoje konto
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="topUpAmount" class="form-label">Wprowadź kwotę
                                                            doładowania z zakresu od 0,01 do 999,99.</label>
                                                        <input type="number" class="form-control" id="topUpAmount"
                                                            name="amount" min="0.01" max="999.99" step="0.01"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Anuluj</button>
                                                    <button type="submit" class="btn btn-danger">Doładuj</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-5 mt-md-0">
                                <h5>Twoje wyniki z egzaminu</h5>
                                <strong>Matematyka:</strong> {{ $candidate->result_math }}<br>
                                <strong>Język Polski:</strong> {{ $candidate->result_polish_language }}<br>
                                <strong>Język Angielski:</strong> {{ $candidate->result_english_language }}<br>
                                <strong>Nazwa czwartego przedmiotu:</strong>
                                {{ $candidate->name_fourth_subject }}<br>
                                <strong>Czwarty przedmiot:</strong> {{ $candidate->result_fourth_subject }}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($ifUserRegistrations)
                <div class="row">
                    <div class="col-12">
                        <div class="card special-card mt-4">
                            <div class="row">
                                <div class="text-center my-2">
                                    <h2 class="px-3">Wybrany profil: {{ strtolower($profile->name) }}</h2>
                                </div>
                                @include('layouts.profile-show-card')
                            </div>
                        </div>
                        @if ($profile->open_recruitment === true)
                            <div class="card special-card mt-4">
                                <div class="text-center my-2">
                                    <h2 class="px-3">Tablica rankingowa</h2>
                                </div>
                                <div class="table-responsive">
                                    <div class="table-div-special">
                                        @include('layouts.table-profile-register-points')
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card special-card mt-4">
                                <div class="text-center my-2">
                                    <h2 class="px-3">Końcowa tablica rankingowa</h2>
                                </div>
                                <div class="table-responsive">
                                    <div class="table-div-special">
                                        @include('layouts.table-registrations-profile', [
                                            'registrations' => $registrationsByProfileId ?? '',
                                        ])
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card special-card">
                            @php
                                $genderText = $candidate->user->data->gender === 'Kobieta' ? 'zapisana' : 'zapisany';
                            @endphp
                            <div class="row card-body">
                                <div class="col-12">
                                    <h3>Nie jesteś {{ $genderText }} na żaden profil.</h3>
                                    <span>Jeśli chcesz zapisać się na jakiś profil, kliknij
                                        <a
                                            href="{{ route('home.profiles') }}"class="text-color-href text-decoration-none">tutaj</a>
                                        aby przegłądnąć dostępne oferty.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
