<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Services\ManagerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ManagerDeleteController extends Controller
{
    public function __construct() {
        $this->middleware('canDeleteModels');
    }

    public function __invoke(Manager $manager, ManagerService $service): JsonResponse
    {
        return response()->json($service->delete($manager));
    }
}
