<?php

namespace Task;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetAllTaskTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }


    public function test_user_can_get_all_tasks()
    {
        //arrange:
        $count = $this->faker->numberBetween(1, 10);
        Task::factory($count)->create();
        $this->prepareAuthUser('User');
        //act:
        $response = $this->getJson(route('api.tasks.index'));
        //assert
        $response->assertOk();
        $response->assertJson(
            fn(AssertableJson $json) => $json->has('data', $count)->etc(),
        );
    }

    public function test_admin_can_get_all_tasks()
    {
        //arrange:
        $count = $this->faker->numberBetween(1, 10);
        Task::factory($count)->create();
        $this->prepareAuthUser('Admin');
        //act:
        $response = $this->getJson(route('api.tasks.index'));
        //assert
        $response->assertOk();
        $response->assertJson(
            fn(AssertableJson $json) => $json->has('data', $count)->etc(),
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
