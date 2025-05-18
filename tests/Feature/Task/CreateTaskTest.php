<?php

namespace Tests\Feature\Task;

use App\Models\Role;
use App\Models\User;
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
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert
        $response->assertOk();
        $this->assertDatabaseHas('tasks', [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public function test_admin_can_create_task()
    {
        //arrange:
        $this->prepareAuthUser('Admin');
        $request = $this->getRequest();
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert
        $response->assertOk();
        $this->assertDatabaseHas('tasks', [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }

    public function test_title_is_required()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        unset($request['title']);
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert:
        $response->assertExactJson([
            "message" => "The title field is required.",
            "errors" => [
                "title" => [
                    "The title field is required."
                ]
            ]
        ]);
    }

    public function test_title_should_be_string()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['title'] = 5;
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert:
        $response->assertExactJson([
            "message" => "The title field must be a string.",
            "errors" => [
                "title" => [
                    "The title field must be a string."
                ]
            ]
        ]);
    }

    public function test_description_should_be_string()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['description'] = 5;
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert:
        $response->assertExactJson([
            "message" => "The description field must be a string.",
            "errors" => [
                "description" => [
                    "The description field must be a string."
                ]
            ]
        ]);
    }

    public function test_status_is_required()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        unset($request['status']);
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert:
        $response->assertExactJson([
            "message" => "The status field is required.",
            "errors" => [
                "status" => [
                    "The status field is required."
                ]
            ]
        ]);
    }

    public function test_status_should_be_valid()
    {
        //arrange:
        $this->prepareAuthUser('User');
        $request = $this->getRequest();
        $request['status'] = 5;
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert:
        $response->assertExactJson([
            "message" => "The selected status is invalid.",
            "errors" => [
                "status" => [
                    "The selected status is invalid."
                ]
            ]
        ]);
    }

    public function test_unauthenticated_user_cannot_create_task()
    {
        //arrange:
        $request = $this->getRequest();
        //act:
        $response = $this->postJson(route('api.tasks.create'), $request);
        //assert
        $response->assertUnauthorized();
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
