<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAllTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_index_displays_tasks_page(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        Task::factory(5)->create();
        //act:
        $response = $this->get(route('web.task.index'));
        //assert
        $response->assertStatus(200);
        $response->assertViewIs('admin.task.index');
        $response->assertViewHas('tasks');
    }

    public function test_tasks_are_paginated(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        Task::factory(30)->create();
        //act
        $response = $this->get(route('web.task.index'));
        //assert:
        $response->assertStatus(200);
        $tasks = $response->viewData('tasks');
        $this->assertEquals(25, $tasks->perPage());
    }

    public function prepareAuthUser($role): void
    {
        $user = User::factory()->create();
        $userRole = Role::query()->where('name', $role)->first();
        $user->roles()->attach($userRole);
        auth()->login($user);
    }
}
