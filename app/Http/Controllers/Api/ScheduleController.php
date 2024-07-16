<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\ScheduleRequest;
use App\Services\ScheduleService;

class ScheduleController extends AbstractCrudController
{

    public function __construct(
        protected ScheduleService $scheduleService,
        protected ScheduleRequest $scheduleRequest
    ) {
        parent::__construct(
            $scheduleService,
            $scheduleRequest
        );
    }

}
