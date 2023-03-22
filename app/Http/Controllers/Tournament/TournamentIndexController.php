<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tournament\TournamentFullResource;
use App\Http\Resources\Tournament\TournamentMainCollection;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentIndexController extends Controller
{
    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(TournamentService $service): TournamentMainCollection
    {
        return new TournamentMainCollection($service->getAll());
    }

    public function getLatest(TournamentService $service): TournamentFullResource
    {
        return new TournamentFullResource($service->getLatest());
    }

    public function getById(Tournament $tournament): TournamentFullResource
    {
        return new TournamentFullResource($tournament);
    }
}
