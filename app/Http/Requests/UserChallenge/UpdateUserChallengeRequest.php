<?php

namespace App\Http\Requests\UserChallenge;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserChallengeRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'challenge_id' => ['sometimes', 'exists:challenges,id'],
            'completed' => ['sometimes', 'boolean'],
        ];
    }
}
