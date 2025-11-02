@extends('layouts.app')

@section('content')
<section id="huzasok" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Húzások kezelése</h2>
            <p>Itt szerkesztheted vagy törölheted a hatoslottó húzásait.</p>
        </header>

        @if(session('success'))
            <div class="alert alert-success" style="background:#e6ffee; border:1px solid #b3ffb3; padding:10px; border-radius:8px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="text-align:center; margin-bottom:20px;">
            <a href="{{ route('huzasok.create') }}" class="button primary icon solid fa-plus">Új húzás</a>
        </div>

        <div class="table-wrapper" style="background:#fff; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Év</th>
                        <th>Hét</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($huzasok as $huzas)
                        <tr>
                            <td>{{ $huzas->id }}</td>
                            <td>{{ $huzas->ev }}</td>
                            <td>{{ $huzas->het }}</td>
                            <td>
                                <a href="{{ route('huzasok.edit', $huzas) }}" class="button small">✏️ Szerkesztés</a>
                                <form action="{{ route('huzasok.destroy', $huzas) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small danger" onclick="return confirm('Biztosan törlöd?')">🗑️ Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
