<?php

namespace App\Http\Requests\Personalization;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalizationRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'icon_url' => ['sometimes', 'url', 'max:255'],
            'color_theme' => ['sometimes', 'string', 'max:50'],
        ];
    }
}
