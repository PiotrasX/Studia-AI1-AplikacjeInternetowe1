<!doctype html>
<html lang="pl" data-bs-theme="">
@include('shared.head', ['pageTitle' => 'Wycieczki górskie'])

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

    <div id="wycieczki" class="container mt-5">
        <div class="row text-center">
            <h1>Wycieczka {{ $trip->name }}</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    <img src="{{ asset('storage/img/' . $trip->img) }}" class="card-img-top" alt="Obraz wycieczki">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trip->name }}</h5>
                        <p class="card-text">{{ $trip->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')

</html>
