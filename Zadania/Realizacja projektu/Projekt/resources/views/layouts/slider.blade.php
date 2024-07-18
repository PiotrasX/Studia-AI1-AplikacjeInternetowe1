<style>
    .carousel-item {
        position: relative;
        max-height: 75vh;
        background-color: #000000;
    }

    .carousel-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        overflow: hidden;
        height: 100%;
    }

    .carousel-img {
        object-fit: cover;
        width: 100%;
        height: auto;
        margin-top: auto;
        opacity: 0.75;
    }

    .carousel-caption {
        position: absolute;
        width: auto;
        transform: translateY(-25%);
    }

    .carousel-div {
        background: rgba(0, 0, 0, 0.77);
        width: 55%;
        min-width: 625px;
        margin: 0;
        padding: 1.5em;
        border-radius: 3em;
        margin: auto;
    }

    .carousel-caption h1 {
        margin: 0.0625em;
    }

    .carousel-caption img {
        display: block;
        margin: 0 auto 1em auto;
        border-radius: 50%;
        max-width: 10em;
    }
</style>

<div id="start">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slajd 1"
                class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slajd 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slajd 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-wrapper">
                    <img src="img/carousel1.jpg" class="d-block w-100 carousel-img" alt="Zdjęcie slidera 1">
                </div>
                <div class="carousel-caption d-none d-lg-block">
                    <div class="carousel-div">
                        <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid">
                        <h1 class="text-white">Witamy w naszej szkole!</h1>
                        <p class="text-white">Dołącz do nas na niesamowitą edukacyjną podróż.</p>
                        <a href="{{ route('home.about') }}" class="btn btn-danger color-after">Dowiedz się więcej</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-wrapper">
                    <img src="img/carousel2.jpg" class="d-block w-100 carousel-img" alt="Zdjęcie slidera 2">
                </div>
                <div class="carousel-caption d-none d-lg-block">
                    <div class="carousel-div">
                        <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid">
                        <h1 class="text-white">Odkryj profile nauczania!</h1>
                        <p class="text-white">Poznaj różnorodne programy nauczania dostosowane do Twoich potrzeb.</p>
                        <a href="{{ route('home.profiles') }}" class="btn btn-danger color-after">Odkryj profile
                            nauczania</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-wrapper">
                    <img src="img/carousel3.jpg" class="d-block w-100 carousel-img" alt="Zdjęcie slidera 3">
                </div>
                <div class="carousel-caption d-none d-lg-block">
                    <div class="carousel-div">
                        <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid">
                        <h1 class="text-white">Zobacz nasz regulamin!</h1>
                        <p class="text-white">Przeczytaj regulamin aby zapoznać się z zasadami rekrutacji.</p>
                        <a href="{{ route('home.regulations') }}" class="btn btn-danger color-after">Zobacz
                            regulamin</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Poprzedni</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Następny</span>
        </button>
    </div>
</div>
