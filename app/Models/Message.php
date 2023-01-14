<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $guarded = [];

    protected $dates = ['created_at'];

    public function getCreatedAtAttribute($date) {
        $carbonDate = Carbon::createFromFormat('Y-m-d\\TH:i:s.uP', $date);
        return $carbonDate->isToday()
            ? $carbonDate->format('H:i a')
            : $carbonDate->format('d-M-Y H:i a');
    }
}
