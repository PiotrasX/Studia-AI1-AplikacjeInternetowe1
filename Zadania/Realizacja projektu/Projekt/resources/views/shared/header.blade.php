<style>
    html[data-bs-theme='light'] .bg-color {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .bg-color {
        background-color: #2b3035;
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg bg-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <b>Akademia Nauki</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home.index' ? 'active' : '' }}"
                            href="{{ route('home.index') }}">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home.about' ? 'active' : '' }}"
                            href="{{ route('home.about') }}">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home.profiles' ? 'active' : '' }}"
                            href="{{ route('home.profiles') }}">Profile nauczania</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home.regulations' ? 'active' : '' }}"
                            href="{{ route('home.regulations') }}">Regulamin</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-1 mb-lg-0">
                    <li class="pr-5">
                        <button class="nav-link" onclick="themeToggle()"><i class="bi-moon-stars"></i></button>
                    </li>
                    @auth
                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item admin-section">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.profiles' ? 'active' : '' }}"
                                    href="{{ route('admin.profiles') }}">Profile</a>
                            </li>
                        @endif
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            <li class="nav-item admin-section">
                                <a class="nav-link {{ Route::currentRouteName() == 'employee.users' ? 'active' : '' }}"
                                    href="{{ route('employee.users') }}">Użytkownicy</a>
                            </li>
                            <li class="nav-item admin-section">
                                <a class="nav-link {{ Route::currentRouteName() == 'employee.registrations' ? 'active' : '' }}"
                                    href="{{ route('employee.registrations') }}">Zapisy</a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id == 3)
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'candidate.profile' ? 'active' : '' }}"
                                    href="{{ route('candidate.profile') }}">Mój profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'candidate.settings' ? 'active' : '' }}"
                                    href="{{ route('candidate.settings') }}">Ustawienia</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::currentRouteName() == 'auth.logout' ? 'active' : '' }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj
                                się</a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'auth.login' ? 'active' : '' }}"
                                href="{{ route('auth.login') }}">Zaloguj się</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'auth.register' ? 'active' : '' }}"
                                href="{{ route('auth.register') }}">Zarejestruj się</a>
                        </li>
                    @endguest
                </ul>
            </div>
            @include('shared.success-toast')
        </div>
    </nav>
</header>
