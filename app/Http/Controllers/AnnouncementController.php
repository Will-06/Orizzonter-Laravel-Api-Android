<?php

namespace App\Http\Controllers;

use App\Http\Requests\Announcement\StoreAnnouncementRequest;
use App\Http\Requests\Announcement\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Services\AnnouncementService;
use Illuminate\Http\JsonResponse;

class AnnouncementController extends Controller
{
    protected $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    public function index(): JsonResponse
    {
        $announcements = $this->announcementService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $announcements
        ]);
    }

    public function store(StoreAnnouncementRequest $request): JsonResponse
    {
        $announcement = $this->announcementService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Anuncio creado correctamente.',
            'data' => $announcement,
        ], 201);
    }

    public function show(Announcement $announcement): JsonResponse
    {
        $data = $this->announcementService->getByIdWithRelations($announcement);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement): JsonResponse
    {
        $updated = $this->announcementService->update($announcement, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Anuncio actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Announcement $announcement): JsonResponse
    {
        $this->announcementService->delete($announcement);

        return response()->json([
            'status' => 'success',
            'message' => 'Anuncio eliminado correctamente.',
        ]);
    }
}
