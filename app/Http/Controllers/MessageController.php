<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index(): JsonResponse
    {
        $messages = $this->messageService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $messages
        ]);
    }

    public function store(StoreMessageRequest $request): JsonResponse
    {
        $message = $this->messageService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Mensaje creado correctamente.',
            'data' => $message,
        ], 201);
    }

    public function show(Message $message): JsonResponse
    {
        $data = $this->messageService->getByIdWithRelations($message);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateMessageRequest $request, Message $message): JsonResponse
    {
        $updated = $this->messageService->update($message, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Mensaje actualizado correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Message $message): JsonResponse
    {
        $this->messageService->delete($message);

        return response()->json([
            'status' => 'success',
            'message' => 'Mensaje eliminado correctamente.',
        ]);
    }
}
