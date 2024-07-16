<?php

namespace App\Enums;

enum StatusScheduleEnum
{
    const OPEN       = 'status.schedule.open';
    const COMPLETED  = 'status.schedule.completed';

    public static function getAll(): array
    {
        return [
            self::OPEN,
            self::COMPLETED
        ];
    }
}
