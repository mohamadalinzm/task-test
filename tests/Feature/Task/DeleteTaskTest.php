<?php

namespace Task;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTaskTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_admin_can_delete_task()
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $task = Task::factory()->create();
        //act:
        $response = $this->deleteJson(route('api.tasks.destroy', $task->id));
        //assert:
        $response->assertOk();
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

    public function prepareAuthUser($role): void
    {
        $user = User::factory()->create();
        $userRole = Role::query()->where('name', $role)->first();
        $user->roles()->attach($userRole);
        auth()->login($user);
    }
}
