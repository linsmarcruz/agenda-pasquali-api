<?php

namespace App\DTO\User;

use App\DTO\Interfaces\InterfaceDTO;

class UserUpdateDTO implements InterfaceDTO
{

    public function __construct(
        public string $uuid,
        public string $name,
        public string $email
    ) {
    }

    public static function new(array $params)
    {
        $request = $params['request'];
        $id = $params['uuid'];
        return new self(
            $id,
            $request->name,
            $request->email
        );
    }
}
