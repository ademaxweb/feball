<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth');
    }

    public function __invoke(AuthService $service): UserResource
    {
        return new UserResource($service->getUser());
    }
}
