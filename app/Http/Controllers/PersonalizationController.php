<?php

namespace App\Http\Controllers;

use App\Http\Requests\Personalization\StorePersonalizationRequest;
use App\Http\Requests\Personalization\UpdatePersonalizationRequest;
use App\Models\Personalization;
use App\Services\PersonalizationService;
use Illuminate\Http\JsonResponse;

class PersonalizationController extends Controller
{
    protected $personalizationService;

    public function __construct(PersonalizationService $personalizationService)
    {
        $this->personalizationService = $personalizationService;
    }

    public function index(): JsonResponse
    {
        $personalizations = $this->personalizationService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $personalizations
        ]);
    }

    public function store(StorePersonalizationRequest $request): JsonResponse
    {
        $personalization = $this->personalizationService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Personalización creada correctamente.',
            'data' => $personalization,
        ], 201);
    }

    public function show(Personalization $personalization): JsonResponse
    {
        $data = $this->personalizationService->getByIdWithRelations($personalization);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdatePersonalizationRequest $request, Personalization $personalization): JsonResponse
    {
        $updated = $this->personalizationService->update($personalization, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Personalización actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Personalization $personalization): JsonResponse
    {
        $this->personalizationService->delete($personalization);

        return response()->json([
            'status' => 'success',
            'message' => 'Personalización eliminada correctamente.',
        ]);
    }
}
