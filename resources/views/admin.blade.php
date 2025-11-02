@extends('layouts.app')

@section('content')
<section id="admin" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Admin vezérlőpult</h2>
            <p>Rendszer áttekintés és legutóbbi üzenetek.</p>
        </header>

        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-medium">
                <section class="box">
                    <h3>Felhasználók száma</h3>
                    <p>{{ $users }}</p>
                </section>
            </div>
            <div class="col-6 col-12-medium">
                <section class="box">
                    <h3>Összes üzenet</h3>
                    <p>{{ $messages }}</p>
                </section>
            </div>
        </div>

        <hr>

        <h3>Legutóbbi üzenetek</h3>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Felhasználó</th>
                        <th>Tárgy</th>
                        <th>Üzenet</th>
                        <th>Dátum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestMessages as $msg)
                        <tr>
                            <td>{{ $msg->user->name }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>{{ $msg->message }}</td>
                            <td>{{ $msg->created_at->format('Y.m.d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection