<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado correctamente.',
            'data' => $user,
        ], 201);
    }

    public function show(User $user): JsonResponse
    {
        $data = $this->userService->getByIdWithRelations($user);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $updated = $this->userService->update($user, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->userService->delete($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario eliminado correctamente.',
        ]);
    }
}
