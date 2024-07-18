@include('shared.html')

@include('shared.head', ['pageTitle' => 'Regulamin'])

<style>
    html[data-bs-theme='light'] .special-card {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .special-card {
        background-color: #2b3035;
    }

    html[data-bs-theme='light'] .special-text {
        color: #09482f;
    }

    html[data-bs-theme='dark'] .special-text {
        color: #f28490;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="regulations" class="container">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Regulamin rekrutacji</h1>
            </div>

            <div class="row">
                <ol class="mt-4 mb-0" style="margin-bottom: -8px;">
                    <li class="fw-bold special-text">Rejestracja:</li>
                    <ul>
                        <li>Każdy kandydat pragnący wziąć udział w rekrutacji do prywatnej szkoły średniej musi
                            zarejestrować się na stronie internej (w systemie rekrutacyjnym), podając swoje rzeczywiste
                            dane osobowe, w tym imię, nazwisko, adres
                            zamieszkania, numer telefonu czy adres email.</li>
                        <li>Kandydat zobowiązany jest do aktualizacji swoich danych osobowych w systemie
                            rekrutacyjnym w przypadku ich zmiany.</li>
                        <li>Po pomyślnej rejestrakcji konta, kandydat będzie musiał uzupełnić swoje konto o prawdziwe
                            wyniki z poszczególnych przedmiotów uzyskanych na egzaminie ósmoklasisty.</li>
                    </ul>

                    <li class="fw-bold special-text">Wybór kierunku:</li>
                    <ul>
                        <li>Kandydat, który prawidłowo uzupełnił swój profil, będzie mógł wybrać, na jaki profil
                            nauczania chce zgłosić swoją kandydaturę.</li>
                        <li>Dostępne profile nauczania są widoczne w zakładce "Profile nauczania".</li>
                        <li>Kandydat może zgłosić swoją kandydaturę tylko na jeden profil.</li>
                        <li>Kandydat może wybrać profil, na który status rektrutacji widnieje jako "otwarta".</li>
                    </ul>

                    <li class="fw-bold special-text">Opłaty rekrutacyjne:</li>
                    <ul>
                        <li>Opłata za dany profil jest naliczana według cennika dostępnego na stronie internetowej
                            szkoły.</li>
                        <li>Każdy profil może mieć różną opłatę rektutacyjną, wysokość opłaty jest widoczna w
                            szczegółowych informacjach na temat danego profilu.</li>
                        <li>Kandydaci, chcący dostać się na określony kierunek, po złożeniu deklaracji online są
                            zobowiązani do uiszczenia opłaty rekrutacyjnej przed zakończeniem procesu rekrutacji.</li>
                        <li>Opłata rektutacyjna może zostać wniesiona w całości lub częściowo, w zależności od
                            preferencji kandydata.</li>
                        <li>Kandydaci, którzy nie zdążyli złożyć całości opłaty, po zakończeniu rekrutacji nie będą
                            brani pod
                            uwagę w wynikach końcowych rektutacji.</li>
                        <li>Opłata rekrutacyjna jest bezzwrotna, niezależnie od wyniku rekrutacji na dany profil.</li>
                    </ul>

                    <li class="fw-bold special-text">Wyniki rekrutacji:</li>
                    <ul>
                        <li>Wyniki rekrutacji na dany profil, na który kandydat złozył podanie, zostaną wyświetlone w
                            profilu kandydata po zakończeniu rekrutacji na dany kierunek.</li>
                        <li>Kandydaci, którzy uzyskali pozytywny wynik rekrutacji, są zobowiązani do potwierdzenia
                            chęci podjęcia nauki na danym profilu do dwóch tygodni od ogłoszenia wyników rekrutacji.
                        </li>
                        <li>Aby potwierdzić swoją chęć nauki, kandydat zobowiązany jest dostarczyć do placówki szkoły
                            kopię dokumentu ukończenia szkoły podstawowej wraz z kopią dokumentu z wynikami egzaminu
                            ósmoklasisty. Kopię dokumentów muszą być podbite przez dyrektora szkoły do której uczęszczał
                            kandydat.</li>
                    </ul>

                    <li class="fw-bold special-text">Rezygnacja z profilu:</li>
                    <ul>
                        <li>Kandydat może zrezygnować z kandydatury na dany profil w dowolnym momencie, składając
                            pisemne
                            oświadczenie, i wysyłając je do placówki szkoły.</li>
                        <li>Rezygnacja z profilu, zostanie potwierdzona na profilu kandydata do dwóch tygodni od
                            dostania przez szkołę pisemnego oświadczenia.</li>
                        <li>W przypadku rezygnacji z profilu, opłata rekturacyjna nie podlega zwrotowi.</li>
                        <li>Gdy rezygnacja z danego profilu zostanie potwierdzona, kandydat może zgłosić swoją
                            kandydaturę na dowolny inny profil.</li>
                    </ul>

                    <li class="fw-bold special-text">Postanowienia końcowe:</li>
                    <ul>
                        <li>Wszelkie zmiany regulaminu rekrutacji będą publikowane na stronie internetowej szkoły.</li>
                        <li>W sprawach nieuregulowanych regulaminem decyzje podejmuje komisja rekrutacyjna.</li>
                    </ul>
                </ol>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
