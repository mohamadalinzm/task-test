<?php

namespace Tests\Feature\Task;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FindTaskByIdTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }
    public function test_user_can_see_task()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $task = Task::factory()->create();
        //act:
        $response = $this->getJson(route('api.tasks.show', $task->id));
        //assert:
        $response->assertOk();
        $response->assertJson(
            fn(AssertableJson $json) => $json
                ->where('success', true)
                ->where('message', 'The Task has been successfully retrieved.')
                ->has('data')
                ->where('data.id', $task->id)
                ->where('data.title', $task->title)
                ->where('data.description', $task->description)
                ->where('data.status', $task->status)
                ->has('data.created_at')
                ->has('data.updated_at')
        );
    }

    public function prepareAuthUser($role): void
    {
        $user = User::factory()->create();
        $userRole = Role::query()->where('name', $role)->first();
        $user->roles()->attach($userRole);
        auth()->login($user);
    }
}
