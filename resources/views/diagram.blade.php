@extends('layouts.app')

@section('content')
<section id="first" class="main special">
    <header class="major">
        <h2>Évenkénti nyereményösszegek</h2>
        <p>1988 – 2013 közötti adatok alapján</p>
    </header>

    <canvas id="myChart" height="100"></canvas>
    <p class="text-muted">Forrás: Hatoslottó adatok (Laravel beadandó)</p>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const adatok = @json($adatok);
        const ev = adatok.map(a => a.ev);
        const osszeg = adatok.map(a => a.osszeg);

        new Chart(document.getElementById('myChart'), {
            type: 'bar',
            data: {
                labels: ev,
                datasets: [{
                    label: 'Összes nyeremény (Ft)',
                    data: osszeg,
                    backgroundColor: 'rgba(0, 191, 255, 0.5)',
                    borderColor: 'rgba(0, 191, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
</section>
@endsection
