<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class RefreshController extends Controller
{
    public function __invoke(AuthService $service): \Illuminate\Http\JsonResponse
    {
        return $service->respondWithToken($service->refresh());
    }
}
