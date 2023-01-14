<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class ConversationController extends Controller {
    public function index(User $user) {
        MessageResource::withoutWrapping();
        return MessageResource::collection(Message::where(function (Builder $builder) use ($user) {
            return $builder->where('from', $user->uuid)
                ->where('to', Auth::id());
        })->orWhere(function (Builder $builder) use ($user) {
            return $builder->where('from', Auth::id())
                ->where('to', $user->uuid);
        })->limit(100)->get());
    }
}
