<?php

namespace App\Http\Controllers\Stadium;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stadium\StadiumUpdateRequest;
use App\Http\Resources\Stadium\StadiumFullResource;
use App\Models\Stadium;
use App\Services\StadiumService;
use Illuminate\Http\Request;

class StadiumUpdateController extends Controller
{
    public function __construct() {
        $this->middleware('canUpdateModels');
    }

    public function __invoke(StadiumUpdateRequest $request, Stadium $stadium, StadiumService $service): StadiumFullResource
    {
        return new StadiumFullResource($service->update($stadium, $request->validated()));
    }
}
