<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

trait Queryable
{
    /**
     * Obtiene las relaciones permitidas para inclusión.
     * @return array
     */
    public function getAllowIncluded(): array
    {
        return $this->allowIncluded ?? [];
    }

    /**
     * Scope para incluir relaciones dinámicamente.
     * @param Builder $query
     * @return void
     */
    public function scopeIncluded(Builder $query): void
    {
        if (empty($this->allowIncluded) || empty(Request::get('included'))) {
            return;
        }
        $relations = collect(explode(',', Request::get('included')))->intersect($this->allowIncluded)->all();
        if (!empty($relations)) {
            $query->with($relations);
        }
    }

    /**
     * Scope para aplicar filtros tipo LIKE.
     * @param Builder $query
     * @return void
     */
    public function scopeFilter(Builder $query): void
    {
        if (empty($this->allowFilter) || empty(Request::get('filter'))) {
            return;
        }
        foreach (Request::get('filter') as $filter => $value) {
            if (in_array($filter, $this->allowFilter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    /**
     * Scope para ordenar dinámicamente.
     * @param Builder $query
     * @return void
     */
    public function scopeSort(Builder $query): void
    {
        if (empty($this->allowSort) || empty(Request::get('sort'))) {
            return;
        }
        foreach (explode(',', Request::get('sort')) as $sortField) {
            $direction = 'asc';
            $field = $sortField;
            if (str_starts_with($sortField, '-')) {
                $direction = 'desc';
                $field = substr($sortField, 1);
            }
            if (in_array($field, $this->allowSort)) {
                $query->orderBy($field, $direction);
            }
        }
    }

    /**
     * Scope para paginar o obtener todos los registros.
     * @param Builder $query
     * @return \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function scopeGetOrPaginate(Builder $query): \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {
        if (Request::get('perPage')) {
            $perPage = intval(Request::get('perPage'));
            if ($perPage > 0) {
                return $query->paginate($perPage);
            }
        }
        return $query->get();
    }
}