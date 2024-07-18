@include('shared.html')

@include('shared.head', ['pageTitle' => 'Profil ' . mb_strtolower($profile->name, 'UTF-8')])

<style>
    html[data-bs-theme='light'] .special-card {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .special-card {
        background-color: #2b3035;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="profiles">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Profil {{ mb_strtolower($profile->name, 'UTF-8') }}</h1>
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
                                                {{ $profile->hours_subject_extended1 }} godzin</span><br>
                                        @endif
                                        @if ($profile->subjectExtended2)
                                            <span>{{ $profile->subjectExtended2->name }}:
                                                {{ $profile->hours_subject_extended2 }} godzin</span><br>
                                        @endif
                                        @if ($profile->subjectExtended3)
                                            <span>{{ $profile->subjectExtended3->name }}:
                                                {{ $profile->hours_subject_extended3 }} godzin</span><br>
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
                                        @if ($profile->open_recruitment)
                                            @if (Auth::check() && Auth::user()->role_id == 3 && empty($userRegistrations))
                                                <a href="{{ route('candidate.profileRegister', ['id' => $profile->id]) }}"
                                                    class="btn btn-success mt-3">Zapisz się</a><br>
                                            @endif
                                            @if (Auth::check() && Auth::user()->role_id == 3 && in_array($profile->id, $userRegistrations))
                                                <div class="mt-3">
                                                    <span style="font-size: 24px;">Jesteś zapisany na ten
                                                        profil</span><br>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
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
