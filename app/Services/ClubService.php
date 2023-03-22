<?php

namespace App\Services;

use App\Http\Resources\Club\ClubWithPlayersResource;
use App\Models\Club;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ClubService
{
    /**
     * Create a new Club
     * @param array $data
     * @return Model|Builder
     */
    public function store(array $data): Model|Builder
    {
        return Club::query()->create($data);
    }

    /**
     * Get all Clubs
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Club::all();
    }

    /**
     * Get the latest Club
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null
    {
        return Club::query()->latest()->first();
    }

    /**
     * Get the Club by ID
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Club::query()->find($id);
    }

    /**
     * Update an existing Club
     * @param Club $Club
     * @param $data
     * @return Club
     */
    public function update(Club $Club, $data): Club
    {
        $Club->update($data);
        return $Club;
    }

    /**
     * Delete an existing Club
     * @param Club $Club
     * @return bool|null
     */
    public function delete(Club $Club): ?bool
    {
        return $Club->delete();
    }
}
