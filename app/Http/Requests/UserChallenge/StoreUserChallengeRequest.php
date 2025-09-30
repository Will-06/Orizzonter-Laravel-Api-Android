<?php

namespace App\Http\Requests\UserChallenge;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserChallengeRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'challenge_id' => ['required', 'exists:challenges,id'],
            'completed' => ['nullable', 'boolean'],
        ];
    }
}
