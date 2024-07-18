@include('shared.html')

@include('shared.head', ['pageTitle' => 'Błąd 403'])

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="404-page">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Strona nie istnieje</h1>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="h-100">
                        <img src="/img/page-not-found.webp" class="d-block w-100" alt="Zdjęcie smutnych uczniów">
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
