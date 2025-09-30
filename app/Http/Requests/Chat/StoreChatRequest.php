<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'is_group' => ['required', 'boolean'],
        ];
    }
}
