<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Auth;

class MessageController extends Controller {
    public function store(StoreMessageRequest $request, User $user) {
        if (empty(trim($request->validated('text')))) {
            MessageResource::withoutWrapping();
            return MessageResource::collection();
        } else {
            $message = Message::create([
                'from' => Auth::id(),
                'to' => $user->uuid,
                'text' =>
                    nl2br(
                        htmlentities(
                            urldecode(str_replace(['\n', '\r', '\r\n'], '<br>', trim($request->validated('text'))))
                            , ENT_QUOTES, 'UTF-8')
                    ),
            ]);
            MessageResource::withoutWrapping();
            return MessageResource::make($message);
        }
    }
}
