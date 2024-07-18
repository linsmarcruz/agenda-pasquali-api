<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class ScheduleTypeControllerDocumentation extends Controller
{
    /**
     * @OA\Get(
     *     path="/scheduleTypes",
     *     tags={"ScheduleTypes"},
     *     summary="Display a listing of the scheduleTypes",
     *     security={{"bearerAuth":{}}},
     *     description="Get all scheduleTypes",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ScheduleType"))
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function index()
    {
    }

     /**
     * @OA\Get(
     *     path="/scheduleTypes/{uuid}",
     *     tags={"ScheduleTypes"},
     *     summary="Display the specified scheduleType",
     *     security={{"bearerAuth":{}}},
     *     description="Get a scheduleType by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/ScheduleType")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="ScheduleType not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Post(
     *     path="/scheduleTypes/",
     *     tags={"ScheduleTypes"},
     *     summary="Store a new scheduleType in storage",
     *     security={{"bearerAuth":{}}},
     *     description="Create a new scheduleType",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ScheduleType")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="ScheduleType created",
     *         @OA\JsonContent(ref="#/components/schemas/ScheduleType")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *     path="/scheduleTypes/{uuid}",
     *     tags={"ScheduleTypes"},
     *     summary="Update the specified scheduleType in storage",
     *     security={{"bearerAuth":{}}},
     *     description="Update a scheduleType by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ScheduleType")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="ScheduleType updated",
     *         @OA\JsonContent(ref="#/components/schemas/ScheduleType")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="ScheduleType not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *     path="/scheduleTypes/{uuid}",
     *     tags={"ScheduleTypes"},
     *     summary="Remove the specified scheduleType from storage",
     *     security={{"bearerAuth":{}}},
     *     description="Delete a scheduleType by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="ScheduleType deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="ScheduleType not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function destroy()
    {
    }
}
