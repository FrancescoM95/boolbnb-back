@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Statistiche relative a {{ $apartment->title }}</h2>
        <div class="chart-container" style="height: 550px">
            <canvas id="myCombinedChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const viewsData = {!! $views !!};
            const messagesData = {!! $messages !!};
            console.log('Messaggi:', {!! json_encode($messages) !!});
            const months = [
                "Gennaio",
                "Febbraio",
                "Marzo",
                "Aprile",
                "Maggio",
                "Giugno",
                "Luglio",
                "Agosto",
                "Settembre",
                "Ottobre",
                "Novembre",
                "Dicembre"
            ];

            const combinedChartData = {
                labels: months,
                datasets: [{
                    label: 'Visualizzazioni',
                    data: Array.from({
                        length: 12
                    }, (_, i) => viewsData.find(item => item.month === (i + 1))?.views_count || 0),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderWidth: 1
                }, {
                    label: 'Messaggi',
                    data: Array.from({
                        length: 12
                    }, (_, i) => messagesData.find(item => item.month === (i + 1))?.messages_count || 0),
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
