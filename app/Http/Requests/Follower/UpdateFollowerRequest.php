<?php

namespace App\Http\Requests\Follower;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFollowerRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'follower_id' => ['sometimes', 'exists:users,id', 'different:user_id'],
        ];
    }
}
