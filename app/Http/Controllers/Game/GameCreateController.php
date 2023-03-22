<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\GameCreateRequest;
use App\Http\Resources\Game\GameFullResource;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(GameCreateRequest $request, GameService $service)
    {
        return new GameFullResource($service->store($request->validated()));
    }
}
