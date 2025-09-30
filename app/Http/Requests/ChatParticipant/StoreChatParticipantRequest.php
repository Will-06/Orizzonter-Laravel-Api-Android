<?php

namespace App\Http\Requests\ChatParticipant;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatParticipantRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'chat_id' => ['required', 'exists:chats,id'],
            'user_id' => ['required', 'exists:users,id'],
            'is_admin' => ['nullable', 'boolean'],
        ];
    }
}
