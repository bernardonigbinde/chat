<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory {
    public function definition() {
        do {
            $from = User::inRandomOrder()->first()->uuid;
            $to = User::inRandomOrder()->first()->uuid;
        } while ($from === $to);

        return [
            'from' => $from,
            'to' => $to,
            'text' => fake()->sentence,
        ];
    }
}
