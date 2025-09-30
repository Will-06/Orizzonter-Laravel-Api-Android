<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reward\StoreRewardRequest;
use App\Http\Requests\Reward\UpdateRewardRequest;
use App\Models\Reward;
use App\Services\RewardService;
use Illuminate\Http\JsonResponse;

class RewardController extends Controller
{
    protected $rewardService;

    public function __construct(RewardService $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function index(): JsonResponse
    {
        $rewards = $this->rewardService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $rewards
        ]);
    }

    public function store(StoreRewardRequest $request): JsonResponse
    {
        $reward = $this->rewardService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Recompensa creada correctamente.',
            'data' => $reward,
        ], 201);
    }

    public function show(Reward $reward): JsonResponse
    {
        $data = $this->rewardService->getByIdWithRelations($reward);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateRewardRequest $request, Reward $reward): JsonResponse
    {
        $updated = $this->rewardService->update($reward, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Recompensa actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Reward $reward): JsonResponse
    {
        $this->rewardService->delete($reward);

        return response()->json([
            'status' => 'success',
            'message' => 'Recompensa eliminada correctamente.',
        ]);
    }
}
