@extends('layouts.app')

@section('content')
<section id="messages" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Üzenetek</h2>
            <p>Az általad küldött üzenetek listája.</p>
        </header>

        @if($messages->isEmpty())
            <p>Nincs megjeleníthető üzenet.</p>
        @else
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            @if(Auth::user()->role === 'admin')
                                <th>Felhasználó</th>
                            @endif
                            <th>Tárgy</th>
                            <th>Üzenet</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $msg)
                            <tr>
                                @if(Auth::user()->role === 'admin')
                                    <td>{{ $msg->user->name }}</td>
                                @endif
                                <td>{{ $msg->subject }}</td>
                                <td>{{ $msg->message }}</td>
                                <td>{{ $msg->created_at->format('Y.m.d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>
@endsection