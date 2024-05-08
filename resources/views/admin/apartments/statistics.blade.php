@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Statiche per {{ $apartment->title }}</h2>
        <div class="chart-container" style="height: 550px">
            <canvas id="myCombinedChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const months = [
                "Giugno 2023",
                "Luglio 2023",
                "Agosto 2023",
                "Settembre 2023",
                "Ottobre 2023",
                "Novembre 2023",
                "Dicembre 2023",
                "Gennaio 2024",
                "Febbraio 2024",
                "Marzo 2024",
                "Aprile 2024",
                "Maggio 2024"
            ];

            // Dati falsi per visualizzazioni e messaggi
            const fakeViewsData = [100, 120, 130, 110, 140, 150, 170, 160, 180, 190, 200, 55];
            const fakeMessagesData = [10, 12, 15, 8, 14, 16, 18, 20, 22, 25, 28, 11];

            // Dati reali dal database
            const realViewsDataMay = {{ $viewsMay ?? 0 }};
            const realMessagesDataMay = {{ $messagesMay ?? 0 }};

            // Somma i dati reali di maggio con i dati falsi
            const combinedViewsDataMay = realViewsDataMay + fakeViewsData[11]; // Indice 11 per maggio
            const combinedMessagesDataMay = realMessagesDataMay + fakeMessagesData[11]; // Indice 11 per maggio

            const combinedChartData = {
                labels: months,
                datasets: [{
                    label: 'Visualizzazioni',
                    data: [...fakeViewsData.slice(0, -1), combinedViewsDataMay],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderWidth: 1
                }, {
                    label: 'Messaggi',
                    data: [...fakeMessagesData.slice(0, -1), combinedMessagesDataMay],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderWidth: 1
                }]
            };

            // Codice per il grafico combinato
            const combinedCtx = document.getElementById('myCombinedChart');
            new Chart(combinedCtx, {
                type: 'bar',
                data: combinedChartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>
@endsection
