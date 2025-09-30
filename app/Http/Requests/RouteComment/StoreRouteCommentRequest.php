<?php

namespace App\Http\Requests\RouteComment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteCommentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'travel_route_id' => ['required', 'exists:travel_routes,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['required', 'string'],
        ];
    }
}
