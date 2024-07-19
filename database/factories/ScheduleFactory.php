<?php

namespace Database\Factories;

use App\Models\ScheduleType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $schedule_type = ScheduleType::factory()->create();
        return [
            'title' =>  fake()->name(),
            'type_uuid' =>  $schedule_type->uuid,
            'description' =>  fake()->name(),
            'start_date' => now(),
            'due_date' => now(),
            'status' => 'status.schedule.open',
            'user_id' => $user->id
        ];
    }
}
