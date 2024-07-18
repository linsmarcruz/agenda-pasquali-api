<?php

namespace App\Repositories;

use App\Models\ScheduleType;
use App\Repositories\Abstracts\AbstractRepositoryEloquentORM;
use Illuminate\Database\Eloquent\Builder;

class ScheduleTypeRepositoryEloquentORM extends AbstractRepositoryEloquentORM
{
    public function __construct()
    {
        parent::__construct(new ScheduleType());
    }
}
