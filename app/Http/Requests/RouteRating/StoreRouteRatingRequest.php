<?php

namespace App\Http\Requests\RouteRating;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRatingRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'travel_route_id' => ['required', 'exists:travel_routes,id'],
            'user_id' => ['required', 'exists:users,id'],
            'rating' => ['required', 'integer', 'between:1,5'],
        ];
    }
}
