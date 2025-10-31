<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact')->with('success', 'Üzenet sikeresen elküldve!');
    }
}
