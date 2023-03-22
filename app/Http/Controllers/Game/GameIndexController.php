<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameFullCollection;
use App\Http\Resources\Game\GameFullResource;
use App\Http\Resources\Tournament\TournamentFullCollection;
use App\Http\Resources\Tournament\TournamentWithGamesCollection;
use App\Models\Game;
use App\Models\Tournament;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameIndexController extends Controller
{

    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(GameService $service): GameFullCollection
    {
        return new GameFullCollection($service->getAll());
    }

    public function getLatest(GameService $service): GameFullResource {
        return new GameFullResource($service->getLatest());
    }

    public function getById(Game $game): GameFullResource {
        return new GameFullResource($game);
    }

    public function getByTournaments(): TournamentFullCollection {
        return new TournamentFullCollection(Tournament::query()->orderBy("name")->get());
    }

    public function getLiveGames(GameService $service): GameFullCollection
    {
        return new GameFullCollection($service->getLive());
    }
}
