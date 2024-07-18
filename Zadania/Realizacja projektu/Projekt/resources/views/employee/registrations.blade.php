@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rejestracje'])

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

    .chart-wrapper {
        overflow-x: auto;
    }

    .chart-container {
        min-width: 640px;
        max-height: 320px;
        padding-right: 20px;
        padding-left: 12px;
        padding-top: 0px;
        padding-bottom: 8px;
    }

    .chart-container canvas {
        display: block;
        width: 100%;
    }
</style>

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
        <div id="users">
            <div class="row text-center mt-0">
                <h1 style="margin-top: -6px;">Rejestracje użytkowników</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($profiles as $profile)
                        <div class="card special-card mt-4">
                            <div class="row">
                                <div class="text-center my-2">
                                    <h1 class="px-3">Profil {{ strtolower($profile->name) }}</h1>
                                </div>
                                @include('layouts.profile-show-card')
                            </div>
                            <hr style="border: 1px solid #000; margin-top: 16px; margin-bottom: 0px;">
                            <div class="text-center my-2 mb-0">
                                <h2 class="px-3" style="margin-bottom: 12px; margin-top: -2px;">Tablica kandydatów
                                </h2>
                            </div>
                            <div class="table-responsive" style="border-radius: 4px;">
                                <div class="table-div-special">
                                    @include('layouts.table-registrations', [
                                        'registrations' => $registrationsByProfileId[$profile->id] ?? [],
                                    ])
                                </div>
                            </div>
                            <hr style="border: 1px solid #000; margin-top: 16px; margin-bottom: 0px;">
                            <div class="row">
                                <div class="text-center my-2 mb-0">
                                    <h2 class="px-3" style="margin-bottom: 6px; margin-top: -2px;">Wyniki egzaminu
                                    </h2>
                                </div>
                                <div class="col-12">
                                    <div class="canvas-responsive chart-wrapper">
                                        <div class="chart-container">
                                            <canvas id="chart-{{ $profile->id }}"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const charts = [];

        function createChart(profileId, averageScores, maxScores, minScores) {
            const canvas = document.getElementById(`chart-${profileId}`);
            const ctx = canvas.getContext('2d');
            const textColor = getComputedStyle(canvas).getPropertyValue('--chart-text-color').trim();
            const gridColor = getComputedStyle(canvas).getPropertyValue('--chart-grid-color').trim();

            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Matematyka', 'Polski', 'Angielski', 'Biologia', 'Chemia', 'Fizyka',
                        'Geografia', 'Historia'
                    ],
                    datasets: [{
                            label: 'Średni wynik',
                            data: averageScores,
                            backgroundColor: 'rgba(0, 102, 204, 0.3)',
                            borderColor: 'rgba(0, 102, 204, 0.6)',
                            borderWidth: 1
                        },
                        {
                            label: 'Maksymalny wynik',
                            data: maxScores,
                            backgroundColor: 'rgba(0, 204, 0, 0.3)',
                            borderColor: 'rgba(0, 204, 0, 0.6)',
                            borderWidth: 1
                        },
                        {
                            label: 'Minimalny wynik',
                            data: minScores,
                            backgroundColor: 'rgba(204, 0, 0, 0.3)',
                            borderColor: 'rgba(204, 0, 0, 0.6)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
            charts.push(chart);
        }

        @foreach ($profiles as $profile)
            const averageScores{{ $profile->id }} = [
                {{ $averageScoresByProfileId[$profile->id]['math'] }},
                {{ $averageScoresByProfileId[$profile->id]['polish'] }},
                {{ $averageScoresByProfileId[$profile->id]['english'] }},
                {{ $averageScoresByProfileId[$profile->id]['biology'] }},
                {{ $averageScoresByProfileId[$profile->id]['chemistry'] }},
                {{ $averageScoresByProfileId[$profile->id]['physics'] }},
                {{ $averageScoresByProfileId[$profile->id]['geography'] }},
                {{ $averageScoresByProfileId[$profile->id]['history'] }}
            ];
            const maxScores{{ $profile->id }} = [
                {{ $maxScoresByProfileId[$profile->id]['math'] }},
                {{ $maxScoresByProfileId[$profile->id]['polish'] }},
                {{ $maxScoresByProfileId[$profile->id]['english'] }},
                {{ $maxScoresByProfileId[$profile->id]['biology'] }},
                {{ $maxScoresByProfileId[$profile->id]['chemistry'] }},
                {{ $maxScoresByProfileId[$profile->id]['physics'] }},
                {{ $maxScoresByProfileId[$profile->id]['geography'] }},
                {{ $maxScoresByProfileId[$profile->id]['history'] }}
            ];
            const minScores{{ $profile->id }} = [
                {{ $minScoresByProfileId[$profile->id]['math'] }},
                {{ $minScoresByProfileId[$profile->id]['polish'] }},
                {{ $minScoresByProfileId[$profile->id]['english'] }},
                {{ $minScoresByProfileId[$profile->id]['biology'] }},
                {{ $minScoresByProfileId[$profile->id]['chemistry'] }},
                {{ $minScoresByProfileId[$profile->id]['physics'] }},
                {{ $minScoresByProfileId[$profile->id]['geography'] }},
                {{ $minScoresByProfileId[$profile->id]['history'] }}
            ];
            createChart('{{ $profile->id }}', averageScores{{ $profile->id }},
                maxScores{{ $profile->id }}, minScores{{ $profile->id }});
        @endforeach

        function updateTextColor() {
            const isDarkTheme = document.documentElement.getAttribute('data-bs-theme') === 'dark';
            const textColor = isDarkTheme ? '#dee2e6' : '#212529';
            const gridColor = isDarkTheme ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

            charts.forEach(chart => {
                chart.options.scales.x.ticks.color = textColor;
                chart.options.scales.y.ticks.color = textColor;
                chart.options.scales.x.grid.color = gridColor;
                chart.options.scales.y.grid.color = gridColor;
                chart.options.plugins.legend.labels.color = textColor;
                chart.update();
            });
        }

        const observer = new MutationObserver(updateTextColor);
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-bs-theme']
        });

        updateTextColor();
    });
</script>
