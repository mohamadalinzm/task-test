<?php

namespace Tests\Feature\API\V1\Auth;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        app(DatabaseSeeder::class)->run();
    }

    public function test_complete_authentication_flow(): void
    {
        //arrange:
        $registerData = [
            'name' => 'Test User',
            'email' => 'flow@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        //act:
        $registerResponse = $this->postJson('/api/v1/register', $registerData);
        $registerResponse->assertStatus(200);
        $token = $registerResponse->json('token');

        $logoutResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/v1/logout');
        $logoutResponse->assertStatus(200);

        $loginResponse = $this->postJson('/api/v1/login', [
            'email' => 'flow@example.com',
            'password' => 'password123',
        ]);

        $loginResponse->assertStatus(200);
        $newToken = $loginResponse->json('token');
        $this->assertNotNull($newToken);

        //assert:
        $this->withHeader('Authorization', 'Bearer ' . $newToken)
            ->postJson('/api/v1/logout')
            ->assertStatus(200);
    }
}
