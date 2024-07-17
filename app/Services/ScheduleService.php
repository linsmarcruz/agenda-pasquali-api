<?php

namespace App\Services;

use App\DTO\Schedule\ScheduleDTO;
use App\Repositories\ScheduleRepositoryEloquentORM;
use App\Services\Abstracts\AbstractCrudService;

class ScheduleService extends AbstractCrudService
{
    public function __construct(
        protected ScheduleRepositoryEloquentORM $scheduleRepository
    ) {

        $scheduleCreateDTO = ScheduleDTO::class;
        $scheduleUpdateDTO = ScheduleDTO::class;

        parent::__construct(
            $scheduleRepository,
            $scheduleCreateDTO,
            $scheduleUpdateDTO
        );
    }

    public function getByDateRange(array $filter): object|null
    {
        return $this->scheduleRepository->getByDateRange($filter);
    }

    public function hasOverLappingSchedule(array $filter): bool
    {
        $data = $this->scheduleRepository->getByDateRange($filter);
        return $data->total() > 0;
    }
}
