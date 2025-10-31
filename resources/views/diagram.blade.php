@extends('layouts.app')

@section('title', 'Évenkénti nyeremények')

@section('content')
<section id="diagram" class="main special">
  <header class="major">
    <h2>Évenkénti nyereményösszegek</h2>
  </header>
  <canvas id="chartCanvas" height="100"></canvas>
  <p class="text-center text-muted mt-3">Forrás: Hatoslottó adatok (Laravel beadandó)</p>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const adatok = @json($adatok);
const ev = adatok.map(a => a.ev);
const osszeg = adatok.map(a => a.osszeg);

new Chart(document.getElementById('chartCanvas'), {
  type: 'bar',
  data: {
    labels: ev,
    datasets: [{
      label: 'Összes nyeremény (Ft)',
      data: osszeg,
      backgroundColor: 'rgba(54,162,235,0.5)',
      borderColor: 'rgba(54,162,235,1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: { y: { beginAtZero: true } },
    plugins: { legend: { display: true } }
  }
});
</script>
@endsection
