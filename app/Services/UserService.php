<?php

namespace App\Services;

use App\DTO\User\UserCreateDTO;
use App\DTO\User\UserUpdateDTO;
use App\Repositories\UserRepositoryEloquentORM;
use App\Services\Abstracts\AbstractCrudService;

class UserService extends AbstractCrudService
{
    public function __construct(
        protected UserRepositoryEloquentORM $userRepository
    ) {

        $userCreateDTO = UserCreateDTO::class;
        $userUpdateDTO = UserUpdateDTO::class;

        parent::__construct(
            $userRepository,
            $userCreateDTO,
            $userUpdateDTO
        );
    }
}
