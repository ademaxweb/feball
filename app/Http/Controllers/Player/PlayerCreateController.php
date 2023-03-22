<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Player\PlayerCreateRequest;
use App\Http\Resources\Player\PlayerFullResource;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(PlayerCreateRequest $request, PlayerService $service): PlayerFullResource
    {
        return new PlayerFullResource($service->store($request->validated()));
    }
}
