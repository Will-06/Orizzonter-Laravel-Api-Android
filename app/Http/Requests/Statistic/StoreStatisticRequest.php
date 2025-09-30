<?php

namespace App\Http\Requests\Statistic;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatisticRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'total_distance' => ['required', 'numeric', 'min:0'],
            'total_time' => ['required', 'integer', 'min:0'],
        ];
    }
}
