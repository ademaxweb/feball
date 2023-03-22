<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryUpdateRequest;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryUpdateController extends Controller
{
    public function __construct() {
        $this->middleware('canUpdateModels');
    }

    public function __invoke(CountryUpdateRequest $request, Country $country, CountryService $service): CountryResource
    {
        return new CountryResource($service->update($country, $request->validated()));
    }
}
