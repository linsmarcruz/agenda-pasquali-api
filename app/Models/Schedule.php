<?php

namespace App\Models;

use App\Models\Abstracts\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Schedule",
 *     type="object",
 *     title="Schedule",
 *     properties={
 *         @OA\Property(property="uuid", type="integer"),
 *         @OA\Property(property="title", type="string"),
 *         @OA\Property(property="type", ref="#/components/schemas/ScheduleType"),
 *         @OA\Property(property="description", type="string"),
 *         @OA\Property(property="start_date", type="string", format="date-time"),
 *         @OA\Property(property="due_date", type="string", format="date-time"),
 *         @OA\Property(property="status", type="string"),
 *         @OA\Property(property="user", ref="#/components/schemas/User"),
 *     }
 * )
 */
class Schedule extends AbstractModel
{
    protected $fillable = [
        'title',
        'type_uuid',
        'description',
        'user_id',
        'start_date',
        'due_date',
        'status',
    ];

    // protected $with = ['type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function type(): HasOne
    // {
    //     return $this->hasOne(ScheduleType::class, 'uuid');
    // }
}
