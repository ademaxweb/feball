<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentDeleteController extends Controller
{

    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Tournament $tournament, TournamentService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->delete($tournament));
    }
}
