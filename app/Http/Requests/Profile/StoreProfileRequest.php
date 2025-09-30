<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'bio' => ['nullable', 'string'],
            'avatar_url' => ['nullable', 'url', 'max:255'],
        ];
    }
}
