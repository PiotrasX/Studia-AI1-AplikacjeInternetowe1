@include('shared.html')

@include('shared.head', ['pageTitle' => 'Profile'])

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
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="profiles">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Profile nauczania</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($profiles as $profile)
                        <div class="card special-card mt-4">
                            <div class="row">
                                <div class="text-center my-2">
                                    <h1 class="px-3">Profil {{ strtolower($profile->name) }}</h1>
                                </div>
                                @include('layouts.profile-show-card')
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mt-4 special-card">
            <div class="row card-body">
                <div class="col-12">
                    <h3>Brakuje profili nauczania?</h3>
                    <span>Jeśli chcesz dodać nowy profil nauczania, kliknij
                        <a href="{{ route('admin.profile.create') }}"
                            class="text-color-href text-decoration-none">tutaj</a> aby wypełnić formularz.</span>
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
