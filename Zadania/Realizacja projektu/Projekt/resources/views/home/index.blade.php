@include('shared.html')

@include('shared.head', ['pageTitle' => 'Strona główna'])

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

    @if (session('success') || session('error'))
        <div class="mb-5">
            @include('shared.session-message')
        </div>
    @endif

    @include('layouts.slider')

    <main class="content container my-5">
        <div id="profiles">
            <div class="row text-center">
                <h1 style="margin-top: -6px;">Przykładowe profile nauczania</h1>
            </div>
            <div class="row">
                @forelse ($profiles as $profile)
                    <div class="col-12 col-md-6 col-xl-4 mt-4">
                        <div class="card h-100 special-card">
                            <img src="{{ asset('storage/img/profiles/' . $profile->image) }}" class="card-img-top"
                                alt="{{ $profile->name }}">
                            <div class="card-body" style="text-align: center;">
                                <h4 class="card-title">{{ $profile->name }}</h4>
                                <div class="card-text">
                                    <strong>Wpisowe:</strong>
                                    <span>{{ $profile->entry_fee }} PLN</span><br>
                                    <strong>Stan rekrutacji:</strong>
                                    <span>{{ $profile->open_recruitment ? 'otwarta' : 'zamknięta' }}</span><br>
                                    <a href="{{ route('home.profileShow', ['id' => $profile->id]) }}"
                                        class="btn btn-danger mt-3">Więcej szczegółów...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Brak dostępnych profili.</p>
                @endforelse
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
