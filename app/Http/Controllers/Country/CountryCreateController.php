<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryCreateRequest;
use App\Http\Resources\Country\CountryResource;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryCreateController extends Controller
{
    public function __construct() {
        $this->middleware('canCreateModels');
    }

    public function __invoke(CountryCreateRequest $request, CountryService $service): CountryResource
    {
        return new CountryResource($service->store($request->validated()));
    }
}
