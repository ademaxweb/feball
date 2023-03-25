<?php

namespace App\Http\Controllers\Stadium;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use App\Services\StadiumService;
use Illuminate\Http\Request;

class StadiumDeleteController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Stadium $stadium, StadiumService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->delete($stadium));
    }
}
