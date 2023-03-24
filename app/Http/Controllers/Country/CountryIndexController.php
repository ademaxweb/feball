<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryCollection;
use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Country\CountryWithClubsResource;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryIndexController extends Controller
{
    public function __construct() {
        $this->middleware(['canViewStats']);
    }

    public function __invoke(CountryService $service): CountryCollection
    {
        return new CountryCollection($service->getAll());
    }

    public function getLatest(CountryService $service): CountryResource
    {
        return new CountryResource($service->getLatest());
    }

    public function getById(Country $country): CountryWithClubsResource
    {
        return new CountryWithClubsResource($country);
    }
}
