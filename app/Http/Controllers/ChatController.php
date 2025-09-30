<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\StoreChatRequest;
use App\Http\Requests\Chat\UpdateChatRequest;
use App\Models\Chat;
use App\Services\ChatService;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    protected $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index(): JsonResponse
    {
        $chats = $this->chatService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $chats
        ]);
    }

    public function store(StoreChatRequest $request): JsonResponse
    {
        $chat = $this->chatService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Chat creado correctamente.',
            'data' => $chat,
        ], 201);
    }

    public function show(Chat $chat): JsonResponse
    {
        $data = $this->chatService->getByIdWithRelations($chat);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateChatRequest $request, Chat $chat): JsonResponse
    {
        $updated = $this->chatService->update($chat, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Chat actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Chat $chat): JsonResponse
    {
        $this->chatService->delete($chat);

        return response()->json([
            'status' => 'success',
            'message' => 'Chat eliminado correctamente.',
        ]);
    }
}
