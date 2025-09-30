<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCustomPlace\StoreUserCustomPlaceRequest;
use App\Http\Requests\UserCustomPlace\UpdateUserCustomPlaceRequest;
use App\Models\UserCustomPlace;
use App\Services\UserCustomPlaceService;
use Illuminate\Http\JsonResponse;

class UserCustomPlaceController extends Controller
{
    protected $userCustomPlaceService;

    public function __construct(UserCustomPlaceService $userCustomPlaceService)
    {
        $this->userCustomPlaceService = $userCustomPlaceService;
    }

    public function index(): JsonResponse
    {
        $userCustomPlaces = $this->userCustomPlaceService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $userCustomPlaces
        ]);
    }

    public function store(StoreUserCustomPlaceRequest $request): JsonResponse
    {
        $userCustomPlace = $this->userCustomPlaceService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar personalizado de usuario creado correctamente.',
            'data' => $userCustomPlace,
        ], 201);
    }

    public function show(UserCustomPlace $userCustomPlace): JsonResponse
    {
        $data = $this->userCustomPlaceService->getByIdWithRelations($userCustomPlace);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateUserCustomPlaceRequest $request, UserCustomPlace $userCustomPlace): JsonResponse
    {
        $updated = $this->userCustomPlaceService->update($userCustomPlace, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar personalizado de usuario actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(UserCustomPlace $userCustomPlace): JsonResponse
    {
        $this->userCustomPlaceService->delete($userCustomPlace);

        return response()->json([
            'status' => 'success',
            'message' => 'Lugar personalizado de usuario eliminado correctamente.',
        ]);
    }
}
