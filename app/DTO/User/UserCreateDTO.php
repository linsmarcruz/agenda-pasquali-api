<?php

namespace App\DTO\User;

use App\DTO\Interfaces\InterfaceDTO;

class UserCreateDTO implements InterfaceDTO
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }

    public static function new(array $params)
    {
        $request = $params['request'];
        return new self(
            $request->name,
            $request->email,
            $request->password
        );
    }
}
