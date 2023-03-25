<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryCreateRequest;
use App\Http\Resources\Country\CountryResource;
use App\Models\Permission;
use App\Services\CountryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CountryCreateController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canCreateModels']);
    }

    public function __invoke(CountryCreateRequest $request, CountryService $service)
    {
        $user = auth()->user();
        return new CountryResource($service->store($request->validated()));
    }
}
