<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ManagerUpdateRequest;
use App\Http\Resources\Manager\ManagerFullResource;
use App\Models\Manager;
use App\Services\ManagerService;
use Illuminate\Http\Request;

class ManagerUpdateController extends Controller
{
    public function __construct() {
        $this->middleware(['jwt.auth', 'canUpdateModels']);
    }

    public function __invoke(ManagerUpdateRequest $request, Manager $manager, ManagerService $service): ManagerFullResource
    {
        return new ManagerFullResource($service->update($manager, $request->validated()));
    }
}
