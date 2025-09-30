<?php

namespace App\Http\Controllers;

use App\Http\Requests\Statistic\StoreStatisticRequest;
use App\Http\Requests\Statistic\UpdateStatisticRequest;
use App\Models\Statistic;
use App\Services\StatisticService;
use Illuminate\Http\JsonResponse;

class StatisticController extends Controller
{
    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index(): JsonResponse
    {
        $statistics = $this->statisticService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $statistics
        ]);
    }

    public function store(StoreStatisticRequest $request): JsonResponse
    {
        $statistic = $this->statisticService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Estadística creada correctamente.',
            'data' => $statistic,
        ], 201);
    }

    public function show(Statistic $statistic): JsonResponse
    {
        $data = $this->statisticService->getByIdWithRelations($statistic);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateStatisticRequest $request, Statistic $statistic): JsonResponse
    {
        $updated = $this->statisticService->update($statistic, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Estadística actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Statistic $statistic): JsonResponse
    {
        $this->statisticService->delete($statistic);

        return response()->json([
            'status' => 'success',
            'message' => 'Estadística eliminada correctamente.',
        ]);
    }
}
