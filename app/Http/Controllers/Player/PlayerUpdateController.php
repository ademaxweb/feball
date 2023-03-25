<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Player\PlayerUpdateRequest;
use App\Http\Resources\Player\PlayerFullResource;
use App\Models\Player;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerUpdateController extends Controller
{

    public function __construct() {
        $this->middleware(['jwt.auth', 'canUpdateModels']);
    }

    public function __invoke(PlayerUpdateRequest $request, Player $player, PlayerService $service): PlayerFullResource
    {
        return new PlayerFullResource($service->update($player, $request->validated()));
    }
}
