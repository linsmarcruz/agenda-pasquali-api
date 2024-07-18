<?php

namespace App\Models;

use App\Models\Abstracts\AbstractModel;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Schedule",
 *     type="object",
 *     title="Schedule",
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="title", type="string"),
 *         @OA\Property(property="type", type="string"),
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
        'type',
        'description',
        'user_id',
        'start_date',
        'due_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
