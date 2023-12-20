<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Service\Auth\AuthService;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        [$user, $token] = AuthService::authenticate($request->validated());

        return $this->success(compact('user', 'token'));
    }

    public function register(RegisterRequest $request)
    {
        [$user, $token] = AuthService::register($request->validated());

        return $this->success(compact('user', 'token'));
    }
}
