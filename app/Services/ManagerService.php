<?php

namespace App\Services;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class ManagerService
{


    /**
     * Create new manager
     * @param array $data
     * @return Model|Builder
     */
    public function store(array $data): Model|Builder
    {
        return Manager::query()->create($data);
    }

    /**
     * Get all managers
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Manager::all();
    }

    /**
     * Get the latest of managers
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null
    {
        return Manager::query()->latest()->first();
    }

    /**
     * Update an existing manager
     * @param Manager $manager
     * @param array $data
     * @return Manager
     */
    public function update(Manager $manager, array $data): Manager
    {
        $manager->update($data);
        return $manager;
    }


    /**
     * Delete an existing manager
     * @param Manager $manager
     * @return bool|null
     */
    public function delete(Manager $manager): ?bool
    {
        return $manager->delete();
    }
}
