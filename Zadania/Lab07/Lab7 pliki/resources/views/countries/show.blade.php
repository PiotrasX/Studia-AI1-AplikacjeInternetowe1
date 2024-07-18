@include('shared.html')

@include('shared.head', ['pageTitle' => 'Informacje o kraju'])

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    @include('shared.navbar')

    <div class="container mt-5">
        <h1>Informacje o kraju</h1>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nazwa: {{ $country->name }}</li>
                <li class="list-group-item">Kod: {{ $country->code }}</li>
                <li class="list-group-item">Waluta: {{ $country->currency }}</li>
                <li class="list-group-item">Powierzchnia: {{ $country->area }} km²</li>
                <li class="list-group-item">Język: {{ $country->language }}</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Edycja</a>
                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </form>
            </div>
        </div>
        <a href="{{ route('countries.index') }}" class="btn btn-link mt-4">Powrót do krajów</a>
    </div>

    @include('shared.footer')
</body>

</html>
