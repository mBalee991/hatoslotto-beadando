@extends('layouts.app')

@section('title', 'Hatoslottó - Főoldal')

@section('content')
<section id="intro" class="main">
  <div class="spotlight">
    <div class="content">
      <header class="major">
        <h2>Hatoslottó beadandó</h2>
      </header>
      <p>Laravel 12 alapú webalkalmazás a Hatoslottó húzások és nyeremények statisztikai elemzésére.</p>
      <ul class="actions">
        <li><a href="{{ route('diagram') }}" class="button">Diagram megtekintése</a></li>
      </ul>
    </div>
  </div>
</section>
@endsection
