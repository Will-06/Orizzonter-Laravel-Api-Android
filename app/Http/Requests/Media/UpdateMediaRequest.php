<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'type' => ['sometimes', 'string', 'in:image,video,audio'],
            'url' => ['sometimes', 'url', 'max:255'],
        ];
    }
}
