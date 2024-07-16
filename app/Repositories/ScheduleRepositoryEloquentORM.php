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

    public function getByDateRange(array $filter): object|null
    {
        $schedules = $this->model->where('user_id', $filter['user']->id)
            ->whereBetween('start_date', [$filter['start_date'] . ' 00:00:00', $filter['due_date'] . ' 23:59:59'])
            ->paginate();
        return $schedules;
    }
}
