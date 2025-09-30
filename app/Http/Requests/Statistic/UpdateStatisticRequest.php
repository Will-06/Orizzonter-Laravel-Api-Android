<?php

namespace App\Http\Requests\Statistic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'total_distance' => ['sometimes', 'numeric', 'min:0'],
            'total_time' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
