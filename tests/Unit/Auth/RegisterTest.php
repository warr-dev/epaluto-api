<?php

namespace Tests\Unit\Auth;

use App\Service\Auth\AuthService;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_user_can_register(): void
    {
        $login = [
            'email' => $this->faker()->email(),
            'password' => 'password',
            'name' => $this->faker()->name(),
        ];

        // Perform the authentication
        [$user, $token] = AuthService::register($login);

        // Assertions
        $this->assertNotNull($user);
        $this->assertNotNull($token);

        // Additional assertions based on your specific requirements
    }
}
