<?php

namespace Tests\Feature\Services;

use App\Models\Schedule;
use App\Models\User;
use App\Repositories\ScheduleRepositoryEloquentORM;
use App\Services\ScheduleService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $scheduleService;
    protected $scheduleRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->scheduleRepository = $this->app->make(ScheduleRepositoryEloquentORM::class);
        $this->scheduleService = $this->app->make(ScheduleService::class);
    }

    public function test_create_schedule()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'title',
            'type' => 'type',
            'description' => 'description',
            'start_date' => '2026-07-13 14:00:00',
            'due_date' => '2026-07-13 15:00:00',
            'status' => 'status.schedule.open',
            'user' => [
                'id' => $user->id
            ]
        ];

        $request = new FormRequest($data);

        $schedule = $this->scheduleService->save($request);

        $this->assertInstanceOf(Schedule::class, $schedule);
        $this->assertEquals($data['title'], $schedule->title);
    }

  
}
