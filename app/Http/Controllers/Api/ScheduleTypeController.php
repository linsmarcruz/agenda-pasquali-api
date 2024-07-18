<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\ScheduleTypeRequest;
use App\Services\ScheduleTypeService;

class ScheduleTypeController extends AbstractCrudController
{

    public function __construct(
        protected ScheduleTypeService $scheduleTypeService,
        protected ScheduleTypeRequest $scheduleTypeRequest
    ) {
        parent::__construct(
            $scheduleTypeService,
            $scheduleTypeRequest
        );
    }
}
