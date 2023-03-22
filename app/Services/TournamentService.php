<?php

namespace App\Services;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TournamentService
{
    /**
     * Create a new Tournament
     * @param array $data
     * @return Model|Builder
     */
    public function store(array $data): Model|Builder {
        return Tournament::query()->create($data);
    }

    /**
     * Get all tournaments
     * @return Collection
     */
    public function getAll(): Collection {
        return Tournament::all();
    }

    /**
     * Get the latest tournament
     * @return Model|Builder|null|Tournament
     */
    public function getLatest(): Model|Builder|null|Tournament {
        return Tournament::query()->latest()->first();
    }

    /**
     * Get the tournament by ID
     * @param int $id
     * @return Model|Collection|Builder|array|null|Tournament
     */
    public function getById(int $id): Model|Collection|Builder|array|null|Tournament {
        return Tournament::query()->find($id);
    }

    /**
     * Update an existing tournament
     * @param Tournament $tournament
     * @param array $data
     * @return Tournament
     */
    public function update(Tournament $tournament, array $data): Tournament {
        $tournament->update($data);
        return $tournament;
    }

    /**
     * Delete an existing tournament
     * @param Tournament $tournament
     * @return bool|null
     */
    public function delete(Tournament $tournament): ?bool {
        return $tournament->delete();
    }

    /**
     * Get all the tournament clubs
     * @param Tournament $tournament
     * @return mixed
     */
    public function getClubs(Tournament $tournament): mixed {
        return $tournament->clubs;
    }

    /**
     * Rewrite a list of the tournament clubs
     * @param Tournament $tournament
     * @param array $clubs
     * @return mixed
     */
    public function setClubs(Tournament $tournament, array $clubs): mixed {
        $tournament->clubs()->sync($clubs);
        return $tournament->clubs;
    }
}
