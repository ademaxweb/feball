<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryDeleteController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canDeleteModels']);
    }

    public function __invoke(Country $country, CountryService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->delete($country));
    }
}
