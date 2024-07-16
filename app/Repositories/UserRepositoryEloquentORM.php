<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Abstracts\AbstractRepositoryEloquentORM;

class UserRepositoryEloquentORM extends AbstractRepositoryEloquentORM
{

    public function __construct()
    {
        parent::__construct(new User());
    }

    public function findByEmail(string $email): object|null
    {
        return $this->model->findByEmail($email);
    }
}
