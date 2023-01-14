<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\User;
use Auth;

class ChatController extends Controller {
    public function index() {
        MessageResource::withoutWrapping();
        return inertia('Dashboard', [
            'messages' => MessageResource::collection([]),
            'contacts' => User::whereNot('uuid', Auth::id())->get(),
        ]);
    }
}
