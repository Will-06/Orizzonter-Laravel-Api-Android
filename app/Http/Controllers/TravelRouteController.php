<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelRoute\StoreTravelRouteRequest;
use App\Http\Requests\TravelRoute\UpdateTravelRouteRequest;
use App\Models\TravelRoute;
use App\Services\TravelRouteService;
use Illuminate\Http\JsonResponse;

class TravelRouteController extends Controller
{
    protected $travelRouteService;

    public function __construct(TravelRouteService $travelRouteService)
    {
        $this->travelRouteService = $travelRouteService;
    }

    public function index(): JsonResponse
    {
        $travelRoutes = $this->travelRouteService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $travelRoutes
        ]);
    }

    public function store(StoreTravelRouteRequest $request): JsonResponse
    {
        $travelRoute = $this->travelRouteService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje creada correctamente.',
            'data' => $travelRoute,
        ], 201);
    }

    public function show(TravelRoute $travelRoute): JsonResponse
    {
        $data = $this->travelRouteService->getByIdWithRelations($travelRoute);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateTravelRouteRequest $request, TravelRoute $travelRoute): JsonResponse
    {
        $updated = $this->travelRouteService->update($travelRoute, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(TravelRoute $travelRoute): JsonResponse
    {
        $this->travelRouteService->delete($travelRoute);

        return response()->json([
            'status' => 'success',
            'message' => 'Ruta de viaje eliminada correctamente.',
        ]);
    }
}
