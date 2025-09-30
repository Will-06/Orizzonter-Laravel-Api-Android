<?php

namespace App\Http\Requests\TravelRoute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTravelRouteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'start_point' => ['sometimes', 'string', 'max:255'],
            'end_point' => ['sometimes', 'string', 'max:255'],
            'distance' => ['sometimes', 'numeric', 'min:0'],
        ];
    }
}
