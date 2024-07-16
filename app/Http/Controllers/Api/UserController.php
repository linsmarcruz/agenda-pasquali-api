<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends AbstractCrudController
{

    public function __construct(
        protected UserService $userService,
        protected UserRequest $userRequest
    ) {
        parent::__construct(
            $userService,
            $userRequest
        );
    }
}
