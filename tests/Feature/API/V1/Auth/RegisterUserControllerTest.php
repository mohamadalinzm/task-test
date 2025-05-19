<?php

namespace Tests\Feature\API\V1\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_with_valid_data(): void
    {
        //arrange:
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        //act:
        $response = $this->postJson('/api/v1/register', $userData);
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
                'message' => 'Authenticated.',
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->assertNotNull($response->json('token'));
    }

    public function test_user_cannot_register_with_existing_email(): void
    {
        //arrange:
        User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $userData = [
            'name' => 'Test User',
            'email' => 'existing@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        //act:
        $response = $this->postJson('/api/v1/register', $userData);
        //assert:
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_registration_validation_fails_with_invalid_data(): void
    {
        //act:
        $response = $this->postJson('/api/v1/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);
        //assert:
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_registration_validation_fails_with_password_mismatch(): void
    {
        //act:
        $response = $this->postJson('/api/v1/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'different123',
        ]);
        //assert:
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }
}
