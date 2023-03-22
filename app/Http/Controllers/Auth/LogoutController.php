<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth');
    }

    public function __invoke(AuthService $service): \Illuminate\Http\JsonResponse
    {
        $service->logout();
        return response()->json(["message" => "Вы успешно вышли из аккаунта"]);
    }
}
