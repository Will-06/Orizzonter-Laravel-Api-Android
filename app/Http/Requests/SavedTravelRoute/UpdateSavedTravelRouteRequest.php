<?php

namespace App\Http\Requests\SavedTravelRoute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSavedTravelRouteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'travel_route_id' => ['sometimes', 'exists:travel_routes,id'],
        ];
    }
}
