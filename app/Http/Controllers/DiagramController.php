<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DiagramController extends Controller
{
    public function index(): View
    {
        // Évenkénti nyereményösszeg lekérdezése
        $adatok = DB::table('nyeremeny')
            ->join('huzas', 'nyeremeny.huzasid', '=', 'huzas.id')
            ->select(DB::raw('huzas.ev, SUM(nyeremeny.ertek * nyeremeny.darab) AS osszeg'))
            ->groupBy('huzas.ev')
            ->orderBy('huzas.ev')
            ->get();

        return view('diagram', compact('adatok'));
    }
}
