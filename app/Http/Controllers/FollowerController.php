<?php

namespace App\Http\Controllers;

use App\Http\Requests\Follower\StoreFollowerRequest;
use App\Http\Requests\Follower\UpdateFollowerRequest;
use App\Models\Follower;
use App\Services\FollowerService;
use Illuminate\Http\JsonResponse;

class FollowerController extends Controller
{
    protected $followerService;

    public function __construct(FollowerService $followerService)
    {
        $this->followerService = $followerService;
    }

    public function index(): JsonResponse
    {
        $followers = $this->followerService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $followers
        ]);
    }

    public function store(StoreFollowerRequest $request): JsonResponse
    {
        $follower = $this->followerService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Seguidor creado correctamente.',
            'data' => $follower,
        ], 201);
    }

    public function show(Follower $follower): JsonResponse
    {
        $data = $this->followerService->getByIdWithRelations($follower);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateFollowerRequest $request, Follower $follower): JsonResponse
    {
        $updated = $this->followerService->update($follower, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Seguidor actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Follower $follower): JsonResponse
    {
        $this->followerService->delete($follower);

        return response()->json([
            'status' => 'success',
            'message' => 'Seguidor eliminado correctamente.',
        ]);
    }
}
