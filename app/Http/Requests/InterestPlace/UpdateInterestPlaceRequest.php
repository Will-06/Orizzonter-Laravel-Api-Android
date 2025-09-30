<?php

namespace App\Http\Requests\InterestPlace;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInterestPlaceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'latitude' => ['sometimes', 'numeric', 'between:-90,90'],
            'longitude' => ['sometimes', 'numeric', 'between:-180,180'],
            'category' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
