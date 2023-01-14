<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource {
    public function toArray($request) {
        return [
            'uuid' => $this->uuid,
            'from' => $this->from,
            'to' => $this->to,
            'text' => $this->text,
            'created_at' => $this->created_at->isToday()
                ? $this->created_at->format('H:i a')
                : $this->created_at->format('d-M-Y H:i a'),
        ];
    }
}
