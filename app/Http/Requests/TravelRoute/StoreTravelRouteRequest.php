<?php

namespace App\Http\Requests\TravelRoute;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRouteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'start_point' => ['required', 'string', 'max:255'],
            'end_point' => ['required', 'string', 'max:255'],
            'distance' => ['required', 'numeric', 'min:0'],
        ];
    }
}
