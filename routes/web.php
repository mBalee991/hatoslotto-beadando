<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagramController;

// Nyitó oldal (mindenki számára)
Route::get('/', function () {
    return view('home');
})->name('home');

// Csak bejelentkezett felhasználóknak
Route::middleware(['auth'])->group(function () {

    // Diagram oldal
    Route::get('/diagram', [DiagramController::class, 'index'])
        ->name('diagram');

    // Dashboard (ha valami erre hivatkozik)
    Route::get('/dashboard', function () {
        // opcionálisan átirányíthatjuk a diagramra
        return redirect()->route('diagram');
    })->name('dashboard');
});

// A Breeze csomag által biztosított auth route-ok (login, register, stb.)
require __DIR__.'/auth.php';
