<?php

namespace Tests\Feature\API\V1\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_logout(): void
    {
        //arrange:
        $user = User::factory()->create();
        //act:
        Sanctum::actingAs($user);
        $response = $this->postJson('/api/v1/logout');
        //assert:
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => '',
                'message' => 'User logged out successfully'
            ]);

        $this->assertCount(0, $user->tokens);
    }

    public function test_unauthenticated_user_cannot_logout(): void
    {
        //act:
        $response = $this->postJson('/api/v1/logout');
        //assert:
        $response->assertStatus(401);
    }
}
