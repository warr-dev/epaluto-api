<?php

namespace Tests\Unit\Auth;

use App\Models\User;
use App\Service\Auth\AuthService;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_user_can_login(): void
    {
        // Mock the data that you'll pass to the authenticate method
        $data = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $login = [
            'email' => $data->email,
            'password' => 'password',
        ];

        // Perform the authentication
        [$user, $token] = AuthService::authenticate($login);

        // Assertions
        $this->assertNotNull($user);
        $this->assertNotNull($token);

        // Additional assertions based on your specific requirements
        // For example, you might want to check if the user is correctly authenticated
        $this->assertTrue(auth()->check());
    }
}
