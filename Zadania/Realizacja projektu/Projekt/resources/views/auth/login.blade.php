@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zaloguj się'])

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
                <h1>Zaloguj się</h1>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <form method="POST" action="{{ route('auth.login.loginAuthenticate') }}" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} {{ $errors->has('error_login') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}">
                        @if ($errors->has('email') && empty(old('email')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 card card-bg-color">
                        <label for="watchword" class="form-label">Hasło</label>
                        <input id="watchword" name="watchword" type="password"
                            class="form-control {{ $errors->has('watchword') ? 'is-invalid' : '' }} {{ $errors->has('error_login') ? 'is-invalid' : '' }}">
                        @if ($errors->has('watchword') && empty(old('watchword')))
                            <div class="invalid-feedback">Uzupełnij to pole!</div>
                        @endif
                    </div>
                    <div class="form-group mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                        <label class="form-check-label" for="remember">Zapamiętaj mnie</label>
                    </div>
                    <div class="text-center mt-4 mb-5">
                        <button class="btn btn-danger color-after" type="submit">Zaloguj się</button>
                    </div>
                    <div class="text-center mt-3">
                        <span>Nie masz konta?</span>
                        <a
                            href="{{ route('auth.register') }}"class="text-color-href text-decoration-none">Zarejestruj się</a>
                        <span>i złóż kandydaturę.</span>
                    </div>
                </form>
            </div>
        </div>

    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
