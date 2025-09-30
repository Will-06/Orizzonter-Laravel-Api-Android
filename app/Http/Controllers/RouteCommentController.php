<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteComment\StoreRouteCommentRequest;
use App\Http\Requests\RouteComment\UpdateRouteCommentRequest;
use App\Models\RouteComment;
use App\Services\RouteCommentService;
use Illuminate\Http\JsonResponse;

class RouteCommentController extends Controller
{
    protected $routeCommentService;

    public function __construct(RouteCommentService $routeCommentService)
    {
        $this->routeCommentService = $routeCommentService;
    }

    public function index(): JsonResponse
    {
        $routeComments = $this->routeCommentService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $routeComments
        ]);
    }

    public function store(StoreRouteCommentRequest $request): JsonResponse
    {
        $routeComment = $this->routeCommentService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Comentario de ruta creado correctamente.',
            'data' => $routeComment,
        ], 201);
    }

    public function show(RouteComment $routeComment): JsonResponse
    {
        $data = $this->routeCommentService->getByIdWithRelations($routeComment);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateRouteCommentRequest $request, RouteComment $routeComment): JsonResponse
    {
        $updated = $this->routeCommentService->update($routeComment, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Comentario de ruta actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(RouteComment $routeComment): JsonResponse
    {
        $this->routeCommentService->delete($routeComment);

        return response()->json([
            'status' => 'success',
            'message' => 'Comentario de ruta eliminado correctamente.',
        ]);
    }
}
