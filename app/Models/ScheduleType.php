<?php

namespace App\Models;

use App\Models\Abstracts\AbstractModel;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ScheduleType",
 *     type="object",
 *     title="ScheduleType",
 *     properties={
 *         @OA\Property(property="uuid", type="integer"),
 *         @OA\Property(property="description", type="string")
 *     }
 * )
 */
class ScheduleType extends AbstractModel
{
    protected $fillable = [
        'title',
        'description'
    ];
}
