@extends('layouts.app')

@section('title', 'Évenkénti nyeremények')

@section('content')
<section id="diagram" class="main special">
  <header class="major">
    <h2>Évenkénti nyereményösszegek</h2>
    <p>Az adatok a Hatoslottó húzások és nyeremények alapján, 1988–2013 között.</p>
  </header>

  <div style="width: 100%; max-width: 900px; margin: 0 auto;">
    <canvas id="chartCanvas" height="100"></canvas>
  </div>

  <p class="text-center text-muted mt-3">
    Forrás: Hatoslottó adatok (Laravel beadandó)
  </p>
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
      backgroundColor: 'rgba(54, 162, 235, 0.6)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: true },
      tooltip: {
        callbacks: {
          label: ctx => ctx.parsed.y.toLocaleString('hu-HU') + ' Ft'
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: v => v.toLocaleString('hu-HU') + ' Ft'
        }
      }
    }
  }
});
</script>
@endsection
