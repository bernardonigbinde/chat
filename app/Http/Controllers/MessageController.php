<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\User;
use Auth;

class MessageController extends Controller {
    public function store(StoreMessageRequest $request, User $user) {
        Message::create([
            'from' => Auth::id(),
            'to' => $user->uuid,
            'text' =>
                nl2br(
                htmlentities(
                urldecode(str_replace(['\n', '\r', '\r\n'], '<br>', $request->validated('text')))
                , ENT_QUOTES, 'UTF-8')
                ),
        ]);
        return redirect()->route('single.conversation', $user);
    }
}
