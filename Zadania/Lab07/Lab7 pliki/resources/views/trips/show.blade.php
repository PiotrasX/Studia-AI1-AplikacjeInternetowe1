@include('shared.html')

@include('shared.head', ['pageTitle' => 'Wycieczka ' . $trip->name])

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
        <h1>Informacje o wycieczce</h1>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nazwa: {{ $trip->name }}</li>
                <li class="list-group-item">Kontynent: {{ $trip->continent }}</li>
                <li class="list-group-item">Kraj: {{ $trip->country->name }}</li>
                <li class="list-group-item">Czas trwania: {{ $trip->period }} dni</li>
                <li class="list-group-item">Opis: {{ $trip->description }}</li>
                <li class="list-group-item">Cena: {{ $trip->price }} PLN</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary">Edycja</a>
                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </form>
            </div>
        </div>
        <a href="{{ route('trips.index') }}" class="btn btn-link mt-4">Powrót do listy wycieczek</a>
    </div>

    @include('shared.footer')

    </html>
