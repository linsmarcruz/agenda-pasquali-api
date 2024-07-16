<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Abstracts\AbstractRepositoryEloquentORM;

class ScheduleRepositoryEloquentORM extends AbstractRepositoryEloquentORM
{
    public function __construct()
    {
        parent::__construct(new Schedule());
    }

}
