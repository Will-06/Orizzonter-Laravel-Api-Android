<?php

namespace App\Http\Requests\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigurationRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'theme' => ['sometimes', 'string', 'in:light,dark'],
            'notifications_enabled' => ['sometimes', 'boolean'],
        ];
    }
}
