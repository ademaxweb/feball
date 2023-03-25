<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Http\Requests\Club\ClubUpdateRequest;
use App\Http\Resources\Club\ClubFullResource;
use App\Models\Club;
use App\Services\ClubService;
use Illuminate\Http\Request;

class ClubUpdateController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canUpdateModels']);
    }

    public function __invoke(ClubUpdateRequest $request, Club $club, ClubService $service): ClubFullResource
    {
        return new ClubFullResource($service->update($club, $request->validated()));
    }
}
