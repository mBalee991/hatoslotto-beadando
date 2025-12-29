<?php

namespace App\Http\Controllers;

use App\Models\Huzas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HuzasController extends Controller
{
    public function index()
    {
        $huzasok = Huzas::orderByDesc('ev')->orderByDesc('het')->get();
        return view('huzasok.index', compact('huzasok'));
    }

    public function create()
    {
        return view('huzasok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ev' => 'required|integer|min:1988|max:2100',
            'het' => [
                'required',
                'integer',
                'min:1',
                'max:52',
                Rule::unique('huzas')->where(fn ($query) => $query->where('ev', $request->ev)),
            ],
        ], [
            'het.unique' => 'Ebben az évben ez a hét már rögzítésre került.',
        ]);

        Huzas::create([
            'ev' => $request->ev,
            'het' => $request->het,
        ]);

        return redirect()->route('huzasok.index')->with('success', 'Új húzás sikeresen rögzítve!');
    }

    public function edit(Huzas $huzas)
    {
        return view('huzasok.edit', compact('huzas'));
    }

    public function update(Request $request, Huzas $huzas)
    {
        $request->validate([
            'ev' => 'required|integer|min:1988|max:2100',
            'het' => [
                'required',
                'integer',
                'min:1',
                'max:52',
                Rule::unique('huzas')
                    ->ignore($huzas->id)
                    ->where(fn ($query) => $query->where('ev', $request->ev)),
            ],
        ], [
            'het.unique' => 'Ebben az évben ez a hét már rögzítésre került.',
        ]);

        $huzas->update([
            'ev' => $request->ev,
            'het' => $request->het,
        ]);

        return redirect()->route('huzasok.index')->with('success', 'A húzás módosítva lett.');
    }

    public function destroy(Huzas $huzas)
    {
        $huzas->delete();
        return redirect()->route('huzasok.index')->with('success', 'A húzás törölve lett.');
    }
}
