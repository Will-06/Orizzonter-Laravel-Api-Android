<?php

namespace App\Http\Requests\ChatParticipant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatParticipantRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'chat_id' => ['sometimes', 'exists:chats,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'is_admin' => ['nullable', 'boolean'],
        ];
    }
}
