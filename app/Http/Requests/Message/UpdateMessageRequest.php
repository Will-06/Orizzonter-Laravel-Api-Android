<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'chat_id' => ['sometimes', 'exists:chats,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'content' => ['sometimes', 'string'],
        ];
    }
}
