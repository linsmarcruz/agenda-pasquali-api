<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Abstracts\AbstractCrudController;
use App\Http\Requests\ScheduleFilterRequest;
use App\Http\Requests\ScheduleRequest;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

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


    /**
     * @OA\Get(
     *     path="/schedules/filter",
     *     tags={"Schedules"},
     *     summary="Get Schedules filtered by date range",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Schedule"))
     *     )
     * )
     */
    public function filterByDateRange(ScheduleFilterRequest $request)
    {

        $validatedData = $request->validated();

        $data = $this->scheduleService->getByDateRange($validatedData);

        return response()->json($data, Response::HTTP_OK);
    }
}
