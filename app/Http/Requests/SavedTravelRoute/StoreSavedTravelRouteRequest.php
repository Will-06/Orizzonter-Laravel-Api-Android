<?php

namespace App\Http\Requests\SavedTravelRoute;

use Illuminate\Foundation\Http\FormRequest;

class StoreSavedTravelRouteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'travel_route_id' => ['required', 'exists:travel_routes,id'],
        ];
    }
}
