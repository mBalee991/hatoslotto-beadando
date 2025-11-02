<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $messages = Message::count();
        $latestMessages = Message::with('user')->latest()->take(5)->get();

        return view('admin', compact('users', 'messages', 'latestMessages'));
    }
}