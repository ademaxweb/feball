<?php

namespace App\Http\Controllers\Stadium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Stadium\StadiumFullResource;
use App\Http\Resources\Stadium\StadiumMainCollection;
use App\Models\Stadium;
use App\Services\StadiumService;
use Illuminate\Http\Request;

class StadiumIndexController extends Controller
{

    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(StadiumService $service): StadiumMainCollection
    {
        return new StadiumMainCollection($service->getAll());
    }

    public function getById(Stadium $stadium): StadiumFullResource
    {
        return new StadiumFullResource($stadium);
    }

    public function getLatest(StadiumService $service): StadiumFullResource
    {
        return new StadiumFullResource($service->getLatest());
    }
}
