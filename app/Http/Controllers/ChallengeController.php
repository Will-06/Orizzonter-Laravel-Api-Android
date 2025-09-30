<?php

namespace App\Http\Controllers;

use App\Http\Requests\Challenge\StoreChallengeRequest;
use App\Http\Requests\Challenge\UpdateChallengeRequest;
use App\Models\Challenge;
use App\Services\ChallengeService;
use Illuminate\Http\JsonResponse;

class ChallengeController extends Controller
{
    protected $challengeService;

    public function __construct(ChallengeService $challengeService)
    {
        $this->challengeService = $challengeService;
    }

    public function index(): JsonResponse
    {
        $challenges = $this->challengeService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $challenges
        ]);
    }

    public function store(StoreChallengeRequest $request): JsonResponse
    {
        $challenge = $this->challengeService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío creado correctamente.',
            'data' => $challenge,
        ], 201);
    }

    public function show(Challenge $challenge): JsonResponse
    {
        $data = $this->challengeService->getByIdWithRelations($challenge);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateChallengeRequest $request, Challenge $challenge): JsonResponse
    {
        $updated = $this->challengeService->update($challenge, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Challenge $challenge): JsonResponse
    {
        $this->challengeService->delete($challenge);

        return response()->json([
            'status' => 'success',
            'message' => 'Desafío eliminado correctamente.',
        ]);
    }
}
