<?php

namespace App\Services;

use App\Models\Stadium;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StadiumService
{

    /**
     * Get all stadiums
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Stadium::all();
    }

    /**
     * Get the stadium by ID
     * @param $id
     * @return Model|Collection|Builder|array|null
     */
    public function getById($id): Model|Collection|Builder|array|null {
        return Stadium::query()->find($id);
    }

    /**
     * Get the latest Stadium
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null {
        return Stadium::query()->latest()->first();
    }

    /**
     * Create new stadium
     * @param array $data
     * @return Model|Builder
     */
    public function store(array $data): Model|Builder {
        return Stadium::query()->create($data);
    }

    /**
     * Update an existing stadium
     * @param Stadium $stadium
     * @param array $data
     * @return Stadium
     */
    public function update(Stadium $stadium, array $data): Stadium {
        $stadium->update($data);
        return $stadium;
    }

    /**
     * Delete an existing stadium
     * @param Stadium $stadium
     * @return bool|null
     */
    public function delete(Stadium $stadium): ?bool {
        return $stadium->delete();
    }



}
