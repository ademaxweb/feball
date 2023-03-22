<?php

namespace App\Http\Controllers\Stadium;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stadium\StadiumCreateRequest;
use App\Http\Resources\Stadium\StadiumFullResource;
use App\Services\StadiumService;
use Illuminate\Http\Request;

class StadiumCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(StadiumCreateRequest $request, StadiumService $service): StadiumFullResource
    {
        return new StadiumFullResource($service->store($request->validated()));
    }
}
