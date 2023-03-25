<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerDeleteController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Player $player, PlayerService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->delete($player));
    }
}
