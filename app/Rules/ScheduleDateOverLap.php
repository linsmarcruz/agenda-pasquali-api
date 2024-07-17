<?php

namespace App\Rules;

use App\Services\ScheduleService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ScheduleDateOverLap implements ValidationRule
{
    protected $user;
    protected $startDate;
    protected $dueDate;
    protected $scheduleService;

    public function __construct($user, $startDate, $dueDate)
    {
        $this->user = $user;
        $this->startDate = $startDate;
        $this->dueDate = $dueDate;
        $this->scheduleService = app(ScheduleService::class);
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $filter = [
            'user' => $this->user,
            'start_date' => $this->startDate,
            'due_date' => $this->dueDate
        ];

        if ($this->scheduleService->hasOverLappingSchedule($filter)) {
            $fail('There is already another schedule on this date.');
        }
    }
}
