<?php

namespace Tests\Feature\Task;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected string $path = 'api/v1/tasks';
    protected string $method = 'POST';

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_user_can_create_tax()
    {
        $this->prepareAuthUserWithWorkspace();
        $request = $this->getRequest();

        $response = $this->makeCall($request);

        $response->assertOk();
        $this->assertDatabaseHas('taxes', [
            'name' => $request['name'],
            'code' => $request['code'],
            'rate' => $request['rate'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'type_id' => $request['type_id'],
            'active' => $request['active']
        ]);
    }

    public function getRequest(): array
    {
        return Task::factory()->make()->toArray();
    }
}
