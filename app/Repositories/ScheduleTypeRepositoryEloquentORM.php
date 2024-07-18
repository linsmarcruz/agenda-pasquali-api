<?php

namespace App\Repositories;

use App\Models\ScheduleType;
use App\Repositories\Abstracts\AbstractRepositoryEloquentORM;

class ScheduleTypeRepositoryEloquentORM extends AbstractRepositoryEloquentORM
{
    public function __construct()
    {
        parent::__construct(new ScheduleType());
    }
}
