@extends('layouts.app')

@section('content')
<section id="create-huzas" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Új húzás felvétele</h2>
            <p>Add meg az év és hét számát, majd kattints a mentésre.</p>
        </header>

        <form method="POST" action="{{ route('huzasok.store') }}" class="form">
            @csrf
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="number" name="ev" placeholder="Év (pl. 2024)" required min="1988" max="2100" value="{{ old('ev') }}">
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="number" name="het" placeholder="Hét (1–52)" required min="1" max="52" value="{{ old('het') }}">
                </div>
                <div class="col-12" style="text-align:center;">
                    <button type="submit" class="button primary icon solid fa-save">Mentés</button>
                    <a href="{{ route('huzasok.index') }}" class="button">Mégse</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
