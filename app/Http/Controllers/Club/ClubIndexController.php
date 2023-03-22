<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Http\Resources\Club\ClubFullResource;
use App\Http\Resources\Club\ClubMainCollection;
use App\Http\Resources\Country\CountryWithClubsCollection;
use App\Models\Club;
use App\Models\Country;
use App\Services\ClubService;
use App\Services\CountryService;
use Illuminate\Http\Request;

class ClubIndexController extends Controller
{
    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(ClubService $service): ClubMainCollection {
        return new ClubMainCollection($service->getAll());
    }

    public function getLatest(ClubService $service): ClubFullResource
    {
        return new ClubFullResource($service->getLatest());
    }

    public function getById(Club $club): ClubFullResource
    {
        return new ClubFullResource($club);
    }

    public function getByCountries(): CountryWithClubsCollection
    {
        return new CountryWithClubsCollection(Country::orderBy("name")->get());
    }

    public function getByTournaments()
    {

    }
}
