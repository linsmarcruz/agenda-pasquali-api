<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\ScheduleFilterRequest;
use App\Http\Requests\ScheduleRequest;
use App\Services\ScheduleService;
use Illuminate\Http\Response;

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

    public function filterByDateRange(ScheduleFilterRequest $request)
    {

        $validatedData = $request->validated();

        $data = $this->scheduleService->getByDateRange($validatedData);

        return response()->json($data, Response::HTTP_OK);
    }
}
