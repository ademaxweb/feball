<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Resources\Player\PlayerFullResource;
use App\Http\Resources\Player\PlayerMainCollection;
use App\Models\Player;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerIndexController extends Controller
{
    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(PlayerService $service): PlayerMainCollection {
        return new PlayerMainCollection($service->getAll());
    }

    public function getLatest(PlayerService $service): PlayerFullResource {
        return new PlayerFullResource($service->getLatest());
    }

    public function getById(Player $player): PlayerFullResource {
        return new PlayerFullResource($player);
    }
}
