<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FindTaskByIdControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_show_displays_task_details(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        $task = Task::factory()->create();
        //act:
        $response = $this->get(route('web.task.show', $task));
        //assert:
        $response->assertStatus(200);
        $response->assertViewIs('admin.task.show');
        $response->assertViewHas('task');
        $this->assertEquals($task->id, $response->viewData('task')->id);
    }

    public function test_show_returns_404_for_non_existent_task(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        $nonExistentId = 999;
        //act:
        $response = $this->get(route('web.task.show', $nonExistentId));
        //assert:
        $response->assertStatus(404);
    }

    public function prepareAuthUser($role): void
    {
        $user = User::factory()->create();
        $userRole = Role::query()->where('name', $role)->first();
        $user->roles()->attach($userRole);
        auth()->login($user);
    }
}
