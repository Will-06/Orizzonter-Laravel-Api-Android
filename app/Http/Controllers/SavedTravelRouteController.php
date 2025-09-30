<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavedTravelRoute\StoreSavedTravelRouteRequest;
use App\Http\Requests\SavedTravelRoute\UpdateSavedTravelRouteRequest;
use App\Models\SavedTravelRoute;
use App\Services\SavedTravelRouteService;
use Illuminate\Http\JsonResponse;

class SavedTravelRouteController extends Controller
{
    protected $savedTravelRouteService;

    public function __construct(SavedTravelRouteService $savedTravelRouteService)
    {
        $this->savedTravelRouteService = $savedTravelRouteService;
    }

    public function index(): JsonResponse
    {
        $savedTravelRoutes = $this->savedTravelRouteService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $savedTravelRoutes
        ]);
    }

    public function store(StoreSavedTravelRouteRequest $request): JsonResponse
    {
        $savedTravelRoute = $this->savedTravelRouteService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje guardada correctamente.',
            'data' => $savedTravelRoute,
        ], 201);
    }

    public function show(SavedTravelRoute $savedTravelRoute): JsonResponse
    {
        $data = $this->savedTravelRouteService->getByIdWithRelations($savedTravelRoute);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateSavedTravelRouteRequest $request, SavedTravelRoute $savedTravelRoute): JsonResponse
    {
        $updated = $this->savedTravelRouteService->update($savedTravelRoute, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje guardada actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(SavedTravelRoute $savedTravelRoute): JsonResponse
    {
        $this->savedTravelRouteService->delete($savedTravelRoute);

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje guardada eliminada correctamente.',
        ]);
    }
}
