<?php

namespace App\DTO\ScheduleType;

use App\DTO\Interfaces\InterfaceDTO;

class ScheduleTypeDTO implements InterfaceDTO
{

    public function __construct(
        public string|null $uuid,
        public string $description
    ) {
    }

    public static function new(array $params)
    {
        $request = $params['request'];
        $uuid = $params['uuid'] ?? null;

        return new self(
            $uuid,
            $request->description
        );
    }
}
