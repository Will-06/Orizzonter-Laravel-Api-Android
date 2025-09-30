<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index(): JsonResponse
    {
        $profiles = $this->profileService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $profiles
        ]);
    }

    public function store(StoreProfileRequest $request): JsonResponse
    {
        $profile = $this->profileService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Perfil creado correctamente.',
            'data' => $profile,
        ], 201);
    }

    public function show(Profile $profile): JsonResponse
    {
        $data = $this->profileService->getByIdWithRelations($profile);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateProfileRequest $request, Profile $profile): JsonResponse
    {
        $updated = $this->profileService->update($profile, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Perfil actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Profile $profile): JsonResponse
    {
        $this->profileService->delete($profile);

        return response()->json([
            'status' => 'success',
            'message' => 'Perfil eliminado correctamente.',
        ]);
    }
}
