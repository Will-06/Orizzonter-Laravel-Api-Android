<?php

namespace App\Http\Requests\Personalization;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalizationRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'icon_url' => ['required', 'url', 'max:255'],
            'color_theme' => ['required', 'string', 'max:50'],
        ];
    }
}
