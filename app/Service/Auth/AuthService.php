<?php

namespace App\Service\Auth;

use App\Models\User;

class AuthService
{
    public static function authenticate(array $data): array
    {
        $data = collect($data);
        $creds = $data->only(['email', 'password'])->toArray();
        $device = $data->get('device', 'web');

        abort_if(! auth()->attempt($creds), 401, 'wrong email or password');
        $user = auth()->user();
        $token = $user->createToken($device)->plainTextToken;

        return [$user, $token];
    }

    public static function register($data)
    {
        $user = User::create($data);
        $token = $user->createToken(request()->input('device', 'web'))->plainTextToken;

        return [$user, $token];
    }
}
