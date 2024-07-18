@include('shared.html')

@include('shared.head', ['pageTitle' => 'Użytkownicy'])

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

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="users">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Użytkownicy aplikacji</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    @if (Auth::user()->role_id == 1)
                        <div class="card special-card mt-4">
                            <div class="text-center my-2">
                                <h2 class="px-3">Administratorzy</h2>
                            </div>
                            <div class="table-responsive">
                                <div class="table-div-special">
                                    @include('layouts.table-employees', ['data' => $admins])
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card special-card mt-4">
                        <div class="text-center my-2">
                            <h2 class="px-3">Pracownicy</h2>
                        </div>
                        <div class="table-responsive">
                            <div class="table-div-special">
                                @include('layouts.table-employees', ['data' => $employees])
                            </div>
                        </div>
                    </div>
                    <div class="card table-responsive special-card mt-4">
                        <div class="text-center my-2">
                            <h2 class="px-3">Użytkownicy</h2>
                        </div>
                        <div class="table-div-special table-wrapper">
                            @include('layouts.table-candidates')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
