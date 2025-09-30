<?php

namespace App\Services\Impl;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

abstract class BaseServiceImpl implements BaseService
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(): LengthAwarePaginator|Collection
    {
        // Si defines scopes como included/filter/sort en el modelo, los usa; si no, devuelve todo
        try {
            if (
                method_exists($this->model, 'scopeIncluded') &&
                method_exists($this->model, 'scopeFilter') &&
                method_exists($this->model, 'scopeSort') &&
                method_exists($this->model, 'scopeGetOrPaginate')
            ) {
                return $this->model::query()
                    ->included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
            }
            return $this->model::all();
        } catch (\Throwable $e) {
            Log::error("Error en getAll de " . get_class($this->model) . ": {$e->getMessage()}");
            throw new \Exception("No se pudieron obtener los recursos.");
        }
    }

    public function store(array $data): Model
    {
        try {
            return $this->model::create($data);
        } catch (\Throwable $e) {
            Log::error("Error en store de " . get_class($this->model) . ": {$e->getMessage()}");
            throw new \Exception("No se pudo crear el recurso.");
        }
    }

    public function update(Model $model, array $data): Model
    {
        try {
            $model->update($data);
            return $model;
        } catch (\Throwable $e) {
            Log::error("Error en update de " . get_class($this->model) . ": {$e->getMessage()}");
            throw new \Exception("No se pudo actualizar el recurso.");
        }
    }

    public function delete(Model $model): ?bool
    {
        try {
            return $model->delete();
        } catch (\Throwable $e) {
            Log::error("Error en delete de " . get_class($this->model) . ": {$e->getMessage()}");
            throw new \Exception("No se pudo eliminar el recurso.");
        }
    }

    public function getByIdWithRelations(Model $model): Model
    {
        try {
            if (method_exists($model, 'getAllowIncluded')) {
                $relations = array_filter(
                    explode(',', request('included', '')),
                    fn ($r) => in_array($r, $model->getAllowIncluded())
                );
                return $model->load($relations);
            }
            return $model;
        } catch (\Throwable $e) {
            Log::error("Error en getByIdWithRelations de " . get_class($this->model) . ": {$e->getMessage()}");
            throw new \Exception("No se pudo cargar el recurso con relaciones.");
        }
    }
}
