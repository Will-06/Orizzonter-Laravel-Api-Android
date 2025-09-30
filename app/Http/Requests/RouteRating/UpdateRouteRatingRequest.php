<?php

namespace App\Http\Requests\RouteRating;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteRatingRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'travel_route_id' => ['sometimes', 'exists:travel_routes,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'rating' => ['sometimes', 'integer', 'between:1,5'],
        ];
    }
}
