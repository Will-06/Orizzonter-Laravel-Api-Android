<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatParticipant\StoreChatParticipantRequest;
use App\Http\Requests\ChatParticipant\UpdateChatParticipantRequest;
use App\Models\ChatParticipant;
use App\Services\ChatParticipantService;
use Illuminate\Http\JsonResponse;

class ChatParticipantController extends Controller
{
    protected $chatParticipantService;

    public function __construct(ChatParticipantService $chatParticipantService)
    {
        $this->chatParticipantService = $chatParticipantService;
    }

    public function index(): JsonResponse
    {
        $chatParticipants = $this->chatParticipantService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $chatParticipants
        ]);
    }

    public function store(StoreChatParticipantRequest $request): JsonResponse
    {
        $chatParticipant = $this->chatParticipantService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Participante de chat creado correctamente.',
            'data' => $chatParticipant,
        ], 201);
    }

    public function show(ChatParticipant $chatParticipant): JsonResponse
    {
        $data = $this->chatParticipantService->getByIdWithRelations($chatParticipant);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateChatParticipantRequest $request, ChatParticipant $chatParticipant): JsonResponse
    {
        $updated = $this->chatParticipantService->update($chatParticipant, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Participante de chat actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(ChatParticipant $chatParticipant): JsonResponse
    {
        $this->chatParticipantService->delete($chatParticipant);

        return response()->json([
            'status' => 'success',
            'message' => 'Participante de chat eliminado correctamente.',
        ]);
    }
}
