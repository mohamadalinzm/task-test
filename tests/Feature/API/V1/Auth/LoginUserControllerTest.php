<?php

namespace Tests\Feature\API\V1\Auth;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        //arrange:
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        //act:
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        //assert:
        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'name',
                    'email',
                ],
                'token',
                'message',
            ])
            ->assertJson([
                'success' => true,
                'message' => 'User authenticated successfully',
            ]);

        $this->assertNotNull($response->json('token'));
    }

    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        //arrange:
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        //act:
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);
        //assert:
        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Invalid credentials',
            ]);
    }

    public function test_login_validation_fails_with_invalid_data(): void
    {
        //act:
        $response = $this->postJson('/api/v1/login', [
            'email' => 'not-an-email',
            'password' => '',
        ]);
        //assert:
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'password']);
    }
}
