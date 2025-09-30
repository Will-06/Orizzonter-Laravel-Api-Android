<?php

namespace App\Http\Controllers;

use App\Http\Requests\Configuration\StoreConfigurationRequest;
use App\Http\Requests\Configuration\UpdateConfigurationRequest;
use App\Models\Configuration;
use App\Services\ConfigurationService;
use Illuminate\Http\JsonResponse;

class ConfigurationController extends Controller
{
    protected $configurationService;

    public function __construct(ConfigurationService $configurationService)
    {
        $this->configurationService = $configurationService;
    }

    public function index(): JsonResponse
    {
        $configurations = $this->configurationService->getAll();

        return response()->json([
            'status' => 'success',
            'data' => $configurations
        ]);
    }

    public function store(StoreConfigurationRequest $request): JsonResponse
    {
        $configuration = $this->configurationService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Configuración creada correctamente.',
            'data' => $configuration,
        ], 201);
    }

    public function show(Configuration $configuration): JsonResponse
    {
        $data = $this->configurationService->getByIdWithRelations($configuration);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(UpdateConfigurationRequest $request, Configuration $configuration): JsonResponse
    {
        $updated = $this->configurationService->update($configuration, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Configuración actualizada correctamente.',
            'data' => $updated->fresh(),
        ]);
    }

    public function destroy(Configuration $configuration): JsonResponse
    {
        $this->configurationService->delete($configuration);

        return response()->json([
            'status' => 'success',
            'message' => 'Configuración eliminada correctamente.',
        ]);
    }
}
