<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class ChatController extends Controller {
    public function index() {
        MessageResource::withoutWrapping();
        return inertia('Dashboard', [
            'messages' => MessageResource::collection([]),
            'contacts' => User::whereNot('uuid', Auth::id())->get(),
        ]);
    }


    public function show(User $user) {
        MessageResource::withoutWrapping();
        return MessageResource::collection(Message::where(function (Builder $builder) use ($user) {
            return $builder->where('from', $user->uuid)
                ->where('to', Auth::id());
        })->orWhere(function (Builder $builder) use ($user) {
            return $builder->where('from', Auth::id())
                ->where('to', $user->uuid);
        })->limit(100)->get());
    }

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
            broadcast(new MessageSent($message));
            MessageResource::withoutWrapping();
            return MessageResource::make($message);
        }
    }
}
