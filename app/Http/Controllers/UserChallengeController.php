<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChallenge\StoreUserChallengeRequest;
use App\Http\Requests\UserChallenge\UpdateUserChallengeRequest;
use App\Models\User;
use App\Models\UserChallenge;
use App\Services\UserChallengeService;
use Illuminate\Http\JsonResponse;

class UserChallengeController extends Controller
{
    protected $userChallengeService;

    public function __construct(UserChallengeService $userChallengeService)
    {
        $this->userChallengeService = $userChallengeService;
    }


    // DEBO AVERIGUAR PA QUE SE COLOCA ESO
    public function index(User $user = null): JsonResponse
    {
        $userChallenges = $this->userChallengeService->getAll($user);

        return response()->json([
            'status' => 'success',
            'data' => $userChallenges
        ]);
    }

    public function store(StoreUserChallengeRequest $request, User $user = null): JsonResponse
    {
        $data = $request->validated();
        if ($user) {
            $data['user_id'] = $user->id;
        }

        $userChallenge = $this->userChallengeService->store($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío de usuario creado correctamente.',
            'data' => $userChallenge,
        ], 201);
    }

    public function show(UserChallenge $userChallenge): JsonResponse
    {
        $data = $this->userChallengeService->getByIdWithRelations($userChallenge);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateUserChallengeRequest $request, UserChallenge $userChallenge): JsonResponse
    {
        $updated = $this->userChallengeService->update($userChallenge, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío de usuario actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(UserChallenge $userChallenge): JsonResponse
    {
        $this->userChallengeService->delete($userChallenge);

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío de usuario eliminado correctamente.',
        ]);
    }
}
