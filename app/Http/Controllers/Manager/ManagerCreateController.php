<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ManagerCreateRequest;
use App\Http\Resources\Manager\ManagerFullResource;
use App\Services\ManagerService;
use Illuminate\Http\Request;

class ManagerCreateController extends Controller
{

    public function __construct() {
        $this->middleware(['jwt.auth', 'canCreateModels']);
    }

    public function __invoke(ManagerCreateRequest $request, ManagerService $service): ManagerFullResource
    {
        return new ManagerFullResource($service->store($request->validated()));
    }
}
