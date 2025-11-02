<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HuzasController;

// Nyitó oldal
Route::get('/', function () {
    return view('home');
})->name('home');

// Csak bejelentkezett felhasználóknak
Route::middleware(['auth'])->group(function () {

    // Diagram
    Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram');

    // Üzenetek
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');

    // Kapcsolat oldal
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // Admin rész – külön csoportban
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        // Húzások CRUD (CSAK ADMINNAK)
        Route::resource('huzasok', HuzasController::class)
            ->parameters(['huzasok' => 'huzas']);
    });
});

// Breeze auth route-ok (login, register stb.)
require __DIR__ . '/auth.php';
