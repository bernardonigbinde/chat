<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

class ConversationController extends Controller {
    public function index(User $user) {
        return response()->json(Message::whereFrom($user->uuid)->orWhere('to', $user->uuid)->get());
    }
}
