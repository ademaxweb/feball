<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, AuthService $service): \Illuminate\Http\JsonResponse
    {
        return $service->respondWithToken($service->login($request->validated()));
    }
}
