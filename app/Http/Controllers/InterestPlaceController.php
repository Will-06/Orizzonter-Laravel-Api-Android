<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestPlace\StoreInterestPlaceRequest;
use App\Http\Requests\InterestPlace\UpdateInterestPlaceRequest;
use App\Models\InterestPlace;
use App\Services\InterestPlaceService;
use Illuminate\Http\JsonResponse;

class InterestPlaceController extends Controller
{
    protected $interestPlaceService;

    public function __construct(InterestPlaceService $interestPlaceService)
    {
        $this->interestPlaceService = $interestPlaceService;
    }

    public function index(): JsonResponse
    {
        $interestPlaces = $this->interestPlaceService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $interestPlaces
        ]);
    }

    public function store(StoreInterestPlaceRequest $request): JsonResponse
    {
        $interestPlace = $this->interestPlaceService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar de interés creado correctamente.',
            'data' => $interestPlace,
        ], 201);
    }

    public function show(InterestPlace $interestPlace): JsonResponse
    {
        $data = $this->interestPlaceService->getByIdWithRelations($interestPlace);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateInterestPlaceRequest $request, InterestPlace $interestPlace): JsonResponse
    {
        $updated = $this->interestPlaceService->update($interestPlace, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar de interés actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(InterestPlace $interestPlace): JsonResponse
    {
        $this->interestPlaceService->delete($interestPlace);

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar de interés eliminado correctamente.',
        ]);
    }
}
