<?php

namespace App\Http\Requests\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfigurationRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'theme' => ['required', 'string', 'in:light,dark'],
            'notifications_enabled' => ['required', 'boolean'],
        ];
    }
}
