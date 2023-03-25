<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameDeleteController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Game $game, GameService $service) {
        return response()->json($service->delete($game));
    }
}
