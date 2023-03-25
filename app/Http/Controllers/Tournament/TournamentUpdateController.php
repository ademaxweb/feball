<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentUpdateRequest;
use App\Http\Resources\Tournament\TournamentFullResource;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentUpdateController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canUpdateModels']);
    }

    public function __invoke
    (
        TournamentUpdateRequest $request,
        Tournament $tournament,
        TournamentService $service

    ): TournamentFullResource
    {
        return new TournamentFullResource($service->update($tournament, $request->validated()));
    }
}
