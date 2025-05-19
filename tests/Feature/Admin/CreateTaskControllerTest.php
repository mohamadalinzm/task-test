<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_create_displays_create_form(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        //act:
        $response = $this->get(route('web.task.create'));
        //assert:
        $response->assertStatus(200);
        $response->assertViewIs('admin.task.create');
        $response->assertViewHas('task');
    }

    public function test_user_store_creates_new_task(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        //act:
        $response = $this->post(route('web.task.store'), $request);
        //assert:
        $response->assertRedirect(route('web.task.index'));
        $this->assertDatabaseHas('tasks', $request);
    }

    public function test_store_validates_required_fields(): void
    {
        //arrange:
        $this->prepareAuthUser('User');
        //act:
        $response = $this->post(route('web.task.store'), []);
        //assert:
        $response->assertSessionHasErrors(['title', 'status']);
    }

    public function test_title_should_be_string()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['title'] = 5;
        //act:
        $response = $this->post(route('web.task.store'), $request);
        //assert:
        $response->assertSessionHasErrors(['title']);
    }

    public function test_description_should_be_string()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['description'] = 5;
        //act:
        $response = $this->post(route('web.task.store'), $request);
        //assert:
        $response->assertSessionHasErrors(['description']);
    }

    public function test_status_should_be_valid()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['status'] = 5;
        //act:
        $response = $this->post(route('web.task.store'), $request);
        //assert:
        $response->assertSessionHasErrors(['status']);
    }

    public function getRequest(): array
    {
        return Task::factory()->make()->toArray();
    }

    public function prepareAuthUser($role): void
    {
        $user = User::factory()->create();
        $userRole = Role::query()->where('name', $role)->first();
        $user->roles()->attach($userRole);
        auth()->login($user);
    }
}
