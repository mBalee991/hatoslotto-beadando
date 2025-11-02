@extends('layouts.app')

@section('content')
<section class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Húzás szerkesztése</h2>
            <p>ID: {{ $huzas->id }}</p>
        </header>

        <form method="POST" action="{{ route('huzasok.update', $huzas) }}">
            @csrf
            @method('PUT')

            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <label>Év</label>
                    <input type="number" name="ev" value="{{ old('ev', $huzas->ev) }}" required>
                </div>

                <div class="col-6 col-12-xsmall">
                    <label>Hét</label>
                    <input type="number" name="het" value="{{ old('het', $huzas->het) }}" required>
                </div>

                <div class="col-12" style="text-align:center;">
                    <button type="submit" class="button primary">Mentés</button>
                    <a href="{{ route('huzasok.index') }}" class="button">Vissza</a>
                </div>
            </div></br>
        </form>
    </div>
</section>
@endsection
