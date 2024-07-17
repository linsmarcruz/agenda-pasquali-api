<?php

namespace Tests\Feature\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_store_schedule_successfully()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create();

        $data = [
            'title' => $schedule->title,
            'type' => $schedule->type,
            'description' => $schedule->description,
            'start_date' => $schedule->start_date->toDateTimeString(),
            'due_date' => $schedule->due_date->toDateTimeString(),
            'status' => $schedule->status,
            'user' => [
                'id' => $user->id
            ]
        ];


        $this->actingAs($user);
        $response = $this->postJson('/api/schedules', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('schedules', ['title' => 'title']);
    }

    public function test_store_schedule_with_overlap()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create();

        $data = [
            'title' => $schedule->title,
            'type' => $schedule->type,
            'description' => $schedule->description,
            'start_date' => $schedule->start_date->toDateTimeString(),
            'due_date' => $schedule->due_date->toDateTimeString(),
            'status' => $schedule->status,
            'user_id' => $user->id
        ];

        Schedule::create($data);

        $data = [
            'title' => $schedule->title,
            'type' => $schedule->type,
            'description' => $schedule->description,
            'start_date' => $schedule->start_date->toDateTimeString(),
            'due_date' => $schedule->due_date->toDateTimeString(),
            'status' => $schedule->status,
            'user' => [
                'id' => $user->id
            ]
        ];

        $this->actingAs($user);
        $response = $this->postJson('/api/schedules', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['start_date']);
    }
}
