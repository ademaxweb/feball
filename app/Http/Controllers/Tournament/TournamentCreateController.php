<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentCreateRequest;
use App\Http\Resources\Tournament\TournamentFullResource;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(TournamentCreateRequest $request, TournamentService $service): TournamentFullResource
    {
        return new TournamentFullResource($service->store($request->validated()));
    }
}
