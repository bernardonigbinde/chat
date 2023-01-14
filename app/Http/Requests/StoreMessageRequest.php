<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest {
    public function authorize(): bool {
//        return Auth::check();
        return true;
    }

    public function rules(): array {
        return [
            'text' => 'string|max:5000'
        ];
    }
}
