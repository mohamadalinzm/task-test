<?php

namespace Tests\Feature\Task;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_user_can_create_task()
    {
        //arrange:
        $request = $this->getRequest();
        //act:
        $response = $this->postJson(route('api.tasks.store'), $request);
        //assert
        $response->assertOk();
        $this->assertDatabaseHas('tasks', [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public function getRequest(): array
    {
        return Task::factory()->make()->toArray();
    }
}
