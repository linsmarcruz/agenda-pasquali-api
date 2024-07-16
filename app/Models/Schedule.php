<?php

namespace App\Models;

use App\Models\Abstracts\AbstractModel;

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
