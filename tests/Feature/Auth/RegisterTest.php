<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_user_can_register_with_valid_values()
    {
        $data = [
            'email' => $this->faker()->email(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'name' => $this->faker()->name(),
        ];

        $response = $this->post('/api/auth/register', $data);

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertJsonFragment(['success' => true]);
        $response->assertJsonStructure(['success', 'data' => ['user', 'token'], 'message']);
    }
}
