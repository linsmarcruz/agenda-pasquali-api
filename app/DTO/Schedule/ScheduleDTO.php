<?php

namespace App\DTO\Schedule;

use App\DTO\Interfaces\InterfaceDTO;

class ScheduleDTO implements InterfaceDTO
{

    public function __construct(
        public string|null $uuid,
        public string $title,
        public string $type,
        public string|null $description,
        public string $start_date,
        public string $due_date,
        public string $status,
        public string $user_id
    ) {
    }

    public static function new(array $params)
    {
        $request = $params['request'];
        $uuid = $params['uuid'] ?? null;

        return new self(
            $uuid,
            $request->title,
            $request->type,
            $request->description,
            $request->start_date,
            $request->due_date,
            $request->status,
            $request->user['id']
        );
    }
}
