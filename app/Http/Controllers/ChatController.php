<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

class ChatController extends Controller {
    public function index() {
        return inertia('Dashboard', [
            'messages' => Message::all(),
            'contacts' => User::all(),
        ]);
    }
}
