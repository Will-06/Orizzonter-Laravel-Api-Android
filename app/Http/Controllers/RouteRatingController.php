<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRating\StoreRouteRatingRequest;
use App\Http\Requests\RouteRating\UpdateRouteRatingRequest;
use App\Models\RouteRating;
use App\Services\RouteRatingService;
use Illuminate\Http\JsonResponse;

class RouteRatingController extends Controller
{
    protected $routeRatingService;

    public function __construct(RouteRatingService $routeRatingService)
    {
        $this->routeRatingService = $routeRatingService;
    }

    public function index(): JsonResponse
    {
        $routeRatings = $this->routeRatingService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $routeRatings
        ]);
    }

    public function store(StoreRouteRatingRequest $request): JsonResponse
    {
        $routeRating = $this->routeRatingService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Calificación de ruta creada correctamente.',
            'data' => $routeRating,
        ], 201);
    }

    public function show(RouteRating $routeRating): JsonResponse
    {
        $data = $this->routeRatingService->getByIdWithRelations($routeRating);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateRouteRatingRequest $request, RouteRating $routeRating): JsonResponse
    {
        $updated = $this->routeRatingService->update($routeRating, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Calificación de ruta actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(RouteRating $routeRating): JsonResponse
    {
        $this->routeRatingService->delete($routeRating);

        return response()->json([
            'status' => 'success',
            'message' => 'Calificación de ruta eliminada correctamente.',
        ]);
    }
}
