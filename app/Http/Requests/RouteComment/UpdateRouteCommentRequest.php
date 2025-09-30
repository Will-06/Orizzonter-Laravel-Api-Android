<?php

namespace App\Http\Requests\RouteComment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteCommentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'travel_route_id' => ['sometimes', 'exists:travel_routes,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'comment' => ['sometimes', 'string'],
        ];
    }
}
