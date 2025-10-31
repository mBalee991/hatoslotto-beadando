<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagramController;

Route::get('/', function () {
    return view('home');
});

Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram');
