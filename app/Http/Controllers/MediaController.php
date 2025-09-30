<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\StoreMediaRequest;
use App\Http\Requests\Media\UpdateMediaRequest;
use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\JsonResponse;

class MediaController extends Controller
{
    protected $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function index(): JsonResponse
    {
        $media = $this->mediaService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $media
        ]);
    }

    public function store(StoreMediaRequest $request): JsonResponse
    {
        $media = $this->mediaService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Media creada correctamente.',
            'data' => $media,
        ], 201);
    }

    public function show(Media $media): JsonResponse
    {
        $data = $this->mediaService->getByIdWithRelations($media);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateMediaRequest $request, Media $media): JsonResponse
    {
        $updated = $this->mediaService->update($media, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Media actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Media $media): JsonResponse
    {
        $this->mediaService->delete($media);

        return response()->json([
            'status' => 'success',
            'message' => 'Media eliminada correctamente.',
        ]);
    }
}
