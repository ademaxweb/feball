<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Services\ClubService;
use Illuminate\Http\Request;

class ClubDeleteController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Club $club, ClubService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->delete($club));
    }
}
