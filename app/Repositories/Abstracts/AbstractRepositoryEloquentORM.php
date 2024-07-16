<?php

namespace App\Repositories\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractRepositoryEloquentORM
{
    public function __construct(
        protected Model $model
    ) {
    }

    public function save(mixed $dto): object
    {
        $model = $this->model->create((array) $dto);

        return $model;
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function getById(string $uuid): object
    {
        $model = $this->model->findOrFail($uuid);
        return $model;
    }

    public function delete(string $uuid): void
    {
        $model = $this->model->findOrFail($uuid);
        $model->delete();
    }


    public function update(mixed $dto): object
    {
        $model = $this->model->findOrFail($dto->uuid);
        $model->update((array) $dto);

        return $model;
    }

    public function getByIds(array $uuids): object
    {
        return $this->model->whereIn('uuid', $uuids)->get();
    }
}
