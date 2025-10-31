@extends('layouts.app')

@section('content')
<section id="contact" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>Kapcsolatfelvétel</h2>
            <p>Küldj üzenetet az adminisztrátornak!</p>
        </header>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row gtr-uniform">
                <div class="col-12 col-6-medium">
                    <input type="text" name="subject" id="subject" placeholder="Tárgy" required value="{{ old('subject') }}">
                    @error('subject') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="col-12">
                    <textarea name="message" id="message" placeholder="Üzenet..." rows="6" required>{{ old('message') }}</textarea>
                    @error('message') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="col-12" style="text-align: center;">
					<li><button type="submit" class="button primary">Küldés</button></li></br>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection