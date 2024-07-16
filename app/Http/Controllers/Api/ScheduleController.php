<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\ScheduleRequest;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
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

    public function filterByDateRange(Request $request)
    {

        $params = self::setParams([
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'user' => $request->user()
        ], [
            'start_date' => 'required|date|date_format:Y-m-d',
            'due_date' => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'user' => 'required'
        ]);
        
        self::validateParams($params);

        $data = $this->scheduleService->getByDateRange($params['values']);

        return response()->json($data, Response::HTTP_OK);
    }
}
