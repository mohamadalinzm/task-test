<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_edit_displays_edit_form(): void
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $task = Task::factory()->create();
        //act:
        $response = $this->get(route('web.task.edit', $task));
        //assert:
        $response->assertStatus(200);
        $response->assertViewIs('admin.task.edit');
        $response->assertViewHas('task');
        $this->assertEquals($task->id, $response->viewData('task')->id);
    }

    public function test_update_updates_task(): void
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $task = Task::factory()->create();
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'status' => 1,
        ];
        //act:
        $response = $this->put(route('web.task.update', $task), $updatedData);
        //assert:
        $response->assertRedirect(route('web.task.index'));
        $this->assertDatabaseHas('tasks', array_merge(['id' => $task->id], $updatedData));
    }

    public function test_edit_returns_404_for_non_existent_task(): void
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $nonExistentId = 999;
        //act:
        $response = $this->get(route('web.task.edit', $nonExistentId));
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
