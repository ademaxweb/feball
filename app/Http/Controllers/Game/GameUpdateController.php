<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\GameUpdateRequest;
use App\Http\Resources\Game\GameFullResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameUpdateController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canUpdateModels']);
    }

    public function __invoke(GameUpdateRequest $request, Game $game, GameService $service): GameFullResource
    {
        return new GameFullResource($service->update($game, $request->validated()));
    }
}
