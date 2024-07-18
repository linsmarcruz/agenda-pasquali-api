<?php

namespace App\Services;

use App\DTO\ScheduleType\ScheduleTypeDTO;
use App\Repositories\ScheduleTypeRepositoryEloquentORM;
use App\Services\Abstracts\AbstractCrudService;

class ScheduleTypeService extends AbstractCrudService
{
    public function __construct(
        protected ScheduleTypeRepositoryEloquentORM $scheduleTypeRepository
    ) {

        $scheduleTypeCreateDTO = ScheduleTypeDTO::class;
        $scheduleTypeUpdateDTO = ScheduleTypeDTO::class;

        parent::__construct(
            $scheduleTypeRepository,
            $scheduleTypeCreateDTO,
            $scheduleTypeUpdateDTO
        );
    }
}
