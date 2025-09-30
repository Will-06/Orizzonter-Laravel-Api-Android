<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseService
{
    public function getAll(): LengthAwarePaginator|Collection;

    public function store(array $data): Model;

    public function update(Model $model, array $data): Model;

    public function delete(Model $model): ?bool;

    public function getByIdWithRelations(Model $model): Model;
}
