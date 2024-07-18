@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rejestracja na profil ' . strtolower($profile->name)])

<style>
    html[data-bs-theme='light'] .special-card {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .special-card {
        background-color: #2b3035;
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
        <div id="profiles">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Rejestracja na profil {{ strtolower($profile->name) }}</h1>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card h-100 special-card">
                        <div class="row">
                            <div class="col-12 col-xl-5 pb-1 pb-xl-0 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('storage/img/profiles/' . $profile->image) }}"
                                    class="card-img-top card-img-bottom px-0" alt="{{ $profile->name }}"
                                    style="max-width: 100%; height: auto; object-fit: contain;">
                            </div>
                            <div class="card-body col-12 col-xl-7" style="text-align: center;">
                                <div class="row mx-0">
                                    <div class="card-text col-12 col-md-4 pb-3 pb-md-0">
                                        <strong>Wpisowe:</strong>
                                        <span>{{ $profile->entry_fee }} PLN</span><br>
                                        <strong>Stan rekrutacji:</strong>
                                        <span>{{ $profile->open_recruitment ? 'otwarta' : 'zamknięta' }}</span><br>
                                        <strong>Ilość kandydatów:</strong>
                                        <span>{{ $registrationsCount[$profile->id] ?? 0 }}</span><br>
                                        <strong>Limit miejsc:</strong>
                                        <span>{{ $profile->number_of_seats }}</span><br>
                                    </div>
                                    <div class="card-text col-12 col-sm-6 col-md-4 pb-3 pb-sm-0">
                                        <strong>Przedmioty rozszerzone:</strong><br>
                                        @if ($profile->subjectExtended1)
                                            <span>{{ $profile->subjectExtended1->name }}:
                                                {{ $profile->hours_subject_extended1 }} godzin</span><br>
                                        @endif
                                        @if ($profile->subjectExtended2)
                                            <span>{{ $profile->subjectExtended2->name }}:
                                                {{ $profile->hours_subject_extended2 }} godzin</span><br>
                                        @endif
                                        @if ($profile->subjectExtended3)
                                            <span>{{ $profile->subjectExtended3->name }}:
                                                {{ $profile->hours_subject_extended3 }} godzin</span><br>
                                        @endif
                                    </div>
                                    <div class="card-text col-12 col-sm-6 col-md-4">
                                        <strong>Przeliczniki punktowe z egzaminu:</strong><br>
                                        @foreach ($subjectsAndWeight as $subject => $weight)
                                            @if ($weight > 0)
                                                <span>{{ $subject }}: {{ $weight }}</span><br>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-text col-12">
                                        @if (Auth::check() && Auth::user()->role_id == 3)
                                            <form action="{{ route('candidate.profileRegisterSend') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                                                <button type="submit" class="btn btn-success mt-3"
                                                    onclick="return confirm('Czy na pewno chcesz zapisać się na ten profil?')">Zapisz
                                                    się na ten profil</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card h-100 special-card">
                        <div class="text-center my-2">
                            <h2 class="px-3">Przelicznik punktowy</h2>
                        </div>
                        <div class="table-responsive">
                            <div class="table-div-special">
                                @include('layouts.table-profile-register')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card h-100 special-card">
                        <div class="text-center my-2">
                            <h2 class="px-3">Tablica rankingowa</h2>
                        </div>
                        <div class="table-responsive">
                            <div class="table-div-special">
                                @include('layouts.table-profile-register-points')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
