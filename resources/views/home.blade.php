@extends('layouts.app')

@section('content')
<section id="intro" class="main">
    <div class="spotlight">
        <div class="content">
            <header class="major">
                <h2>Üdvözöl a Hatoslottó projekt</h2>
            </header>
            <p>
                Ez a Laravel 12-es beadandó projekt a Stellar sablonra épül.  
                Az alkalmazás adatbázisból dolgozik és diagramon mutatja az évenkénti nyereményösszegeket.
            </p>

            @auth
                <a href="{{ route('diagram') }}" class="button primary">Megnyitás</a>
            @else
                <a href="{{ route('login') }}" class="button">Bejelentkezés</a>
            @endauth
        </div>

        <span class="image"><img src="{{ asset('theme/images/pic01.jpg') }}" alt="Hatoslottó" /></span>
    </div>
</section>
@endsection
