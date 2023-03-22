<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Resources\Manager\ManagerFullResource;
use App\Http\Resources\Manager\ManagerMainCollection;
use App\Models\Manager;
use App\Services\ManagerService;
use Illuminate\Http\Request;

class ManagerIndexController extends Controller
{
    public function __construct() {
        $this->middleware('canViewStats');
    }

    public function __invoke(ManagerService $service): ManagerMainCollection
    {
        return new ManagerMainCollection($service->getAll());
    }

    public function getById(Manager $manager): ManagerFullResource
    {
        return new ManagerFullResource($manager);
    }

    public function getLatest(ManagerService $service): ManagerFullResource
    {
        return new ManagerFullResource($service->getLatest());
    }
}
