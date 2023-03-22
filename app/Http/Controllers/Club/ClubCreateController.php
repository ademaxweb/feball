<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Http\Requests\Club\ClubCreateRequest;
use App\Http\Resources\Club\ClubFullResource;
use App\Services\ClubService;
use Illuminate\Http\Request;

class ClubCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(ClubCreateRequest $request, ClubService $service): ClubFullResource
    {
        return new ClubFullResource($service->store($request->validated()));
    }
}
