<?php

namespace App\Services\Abstracts;

use App\Exceptions\ClassNotExistsException;
use App\Exceptions\NotDataFoundException;
use App\Repositories\Abstracts\AbstractRepositoryEloquentORM;
use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractCrudService
{
    public function __construct(
        protected AbstractRepositoryEloquentORM $repository,
        protected string $createDTO,
        protected string $updateDTO
    ) {
    }

    public function save(FormRequest $request): object
    {
        $this->validateClassExists($this->createDTO);

        $dtoParams['request'] = $request;

        $dto = $this->createDTO::new($dtoParams);

        return $this->repository->save($dto);
    }

    public function getAll(): array
    {
        return $this->repository->getAll()->toArray();
    }

    public function getById(string $uuid): object

    {
        $data = $this->repository->getById($uuid);

        $this->validateDataFound($data);

        return $data;
    }

    public function delete(string $uuid): void
    {
        $this->repository->delete($uuid);
    }

    public function update(FormRequest $request, string $uuid): object
    {
        $this->validateClassExists($this->updateDTO);

        $dtoParams = array(
            'request' => $request,
            'uuid' => $uuid
        );

        $dto = $this->updateDTO::new($dtoParams);

        $data = $this->repository->update($dto);

        $this->validateDataFound($data);
        return $data;
    }

    protected function validateDataFound(object|null $data): void
    {
        if ($data === false) {
            throw new NotDataFoundException();
        }
    }

    protected function validateClassExists(string $class)
    {
        if (class_exists($class) === false) {
            throw new ClassNotExistsException();
        }
    }
}
