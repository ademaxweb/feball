<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentSetClubsRequest;
use App\Http\Resources\Club\ClubMainCollection;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentClubsController extends Controller
{

    public function __invoke(Tournament $tournament, TournamentService $service): ClubMainCollection {
        $this->middleware('canViewStats');
        return new ClubMainCollection($service->getClubs($tournament));
    }

    public function setClubs(TournamentSetClubsRequest $request, Tournament $tournament, TournamentService $service): ClubMainCollection {
        $this->middleware('canUpdateModels');
        return new ClubMainCollection($service->setClubs($tournament, $request->validated()["clubs"]));
    }
}
