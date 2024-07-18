<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wycieczki górskie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'trips')) active @endif"
                        href="{{ route('trips.index') }}">Wycieczki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'countries')) active @endif"
                        href="{{ route('countries.index') }}">Kraje</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się... </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('login')) active @endif"
                            href="{{ route('login') }}">Zaloguj się...</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('register.form')) active @endif"
                            href="{{ route('register.form') }}">Zarejestruj się...</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
