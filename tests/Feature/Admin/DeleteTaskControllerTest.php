<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_destroy_deletes_task(): void
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $task = Task::factory()->create();
        //act:
        $response = $this->delete(route('web.task.destroy', $task));
        //assert:
        $response->assertRedirect(route('web.task.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_destroy_returns_404_for_non_existent_task(): void
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $nonExistentId = 999;
        //act:
        $response = $this->delete(route('web.task.destroy', $nonExistentId));
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
