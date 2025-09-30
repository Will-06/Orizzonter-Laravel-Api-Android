<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'chat_id' => ['required', 'exists:chats,id'],
            'user_id' => ['required', 'exists:users,id'],
            'content' => ['required', 'string'],
        ];
    }
}
