<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Ha admin, minden üzenetet lát
        if (Auth::user()->role === 'admin') {
            $messages = Message::with('user')->latest()->get();
        } else {
            // Különben csak a sajátját
            $messages = Message::where('user_id', Auth::id())->latest()->get();
        }

        return view('messages', compact('messages'));
    }
}