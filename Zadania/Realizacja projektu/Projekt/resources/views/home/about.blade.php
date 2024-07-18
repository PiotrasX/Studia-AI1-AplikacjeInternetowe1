@include('shared.html')

@include('shared.head', ['pageTitle' => 'O nas'])

<style>
    html[data-bs-theme='light'] .special-card {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .special-card {
        background-color: #2b3035;
    }

    html[data-bs-theme='light'] .section-title {
        color: #09482f;
        margin-top: 8px;
        margin-bottom: 12px;
    }

    html[data-bs-theme='dark'] .section-title {
        color: #f28490;
        margin-top: 8px;
        margin-bottom: 12px;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="about" class="container">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Witamy w Akademii Nauki</h1>
                <p>Twoje miejsce do nauki, rozwoju i osiągania sukcesów</p>
            </div>
            <div class="row">
                <div class="about-section card special-card mt-4">
                    <h2 class="section-title">O nas</h2>
                    <p>Akademia Nauki to prestiżowa prywatna szkoła średnia, która oferuje szeroki wachlarz kierunków
                        kształcenia. Naszym celem jest zapewnienie najwyższej jakości edukacji, która przygotuje naszych
                        uczniów do przyszłych wyzwań akademickich i zawodowych.</p>
                    <p>Nasza kadra nauczycielska to wykwalifikowani specjaliści z pasją do nauczania i wieloletnim
                        doświadczeniem w swoich dziedzinach. Oferujemy nowoczesne zaplecze dydaktyczne oraz bogaty
                        program zajęć pozalekcyjnych, aby rozwijać zainteresowania i talenty naszych uczniów.</p>
                    <p>Dołącz do nas i odkryj, jak Akademia nauki może pomóc Ci osiągnąć Twoje cele edukacyjne!</p>
                </div>

                <div class="mission-section card special-card mt-4">
                    <h2 class="section-title">Nasza misja</h2>
                    <p>Naszą misją jest tworzenie środowiska, w którym uczniowie mogą rozwijać swoje talenty, pasje i
                        umiejętności, przygotowując się do przyszłości pełnej wyzwań i możliwości.</p>
                </div>

                <div class="vision-section card special-card mt-4">
                    <h2 class="section-title">Nasza wizja</h2>
                    <p>Nasza wizja to szkoła, w której każdy uczeń ma szansę na rozwój intelektualny, emocjonalny i
                        społeczny, wspierany przez zaangażowaną i kompetentną kadrę nauczycielską.</p>
                </div>

                <div class="values-section card special-card mt-4">
                    <h2 class="section-title">Nasze wartości</h2>
                    <p style="margin-bottom: 2px;">W Akademii nauki kierujemy się wartościami takimi jak:</p>
                    <ul>
                        <li>Innowacyjność - Stale poszukujemy nowych metod nauczania i technologii, które wspierają
                            rozwój
                            naszych uczniów.</li>
                        <li>Współpraca - Wierzymy, że sukces osiągamy dzięki pracy zespołowej i współpracy między
                            uczniami,
                            nauczycielami i rodzicami.</li>
                        <li>Równość - Każdy uczeń ma równe szanse na rozwój i dostęp do edukacji najwyższej jakości.
                        </li>
                        <li>Zaangażowanie - Jesteśmy zaangażowani w rozwój każdego ucznia, oferując indywidualne
                            podejście i
                            wsparcie.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
