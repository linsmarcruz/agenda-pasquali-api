<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class ScheduleControllerDocumentation extends Controller
{
    /**
     * @OA\Get(
     *     path="/schedules",
     *     tags={"Schedules"},
     *     summary="Display a listing of the schedules",
     *     security={{"bearerAuth":{}}},
     *     description="Get all schedules",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Schedule"))
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
    public function filterByDateRange()
    {
    }

     /**
     * @OA\Get(
     *     path="/schedules/{uuid}",
     *     tags={"Schedules"},
     *     summary="Display the specified schedule",
     *     security={{"bearerAuth":{}}},
     *     description="Get a schedule by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Schedule")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Schedule not found"
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
     *     path="/schedules/",
     *     tags={"Schedules"},
     *     summary="Store a new schedule in storage",
     *     security={{"bearerAuth":{}}},
     *     description="Create a new schedule",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Schedule")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Schedule created",
     *         @OA\JsonContent(ref="#/components/schemas/Schedule")
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
     *     path="/schedules/{uuid}",
     *     tags={"Schedules"},
     *     summary="Update the specified schedule in storage",
     *     security={{"bearerAuth":{}}},
     *     description="Update a schedule by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Schedule")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Schedule updated",
     *         @OA\JsonContent(ref="#/components/schemas/Schedule")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Schedule not found"
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
     *     path="/schedules/{uuid}",
     *     tags={"Schedules"},
     *     summary="Remove the specified schedule from storage",
     *     security={{"bearerAuth":{}}},
     *     description="Delete a schedule by UUID",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Schedule deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Schedule not found"
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
