<?php

namespace App\Http\Requests\Follower;

use Illuminate\Foundation\Http\FormRequest;

class StoreFollowerRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'follower_id' => ['required', 'exists:users,id', 'different:user_id'],
        ];
    }
}
