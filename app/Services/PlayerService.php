<?php

namespace App\Services;

use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PlayerService
{
    /**
     * Create a new Player
     * @param array $data
     * @return Model|Builder
     */
    public function store(array $data): Model|Builder {
        return Player::query()->create($data);
    }

    /**
     * Get all Players
     * @return Collection
     */
    public function getAll(): Collection {
        return Player::all();
    }

    /**
     * Get the latest Player
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null {
        return Player::query()->latest()->first();
    }

    /**
     * Get the Player by ID
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function getById(int $id): Model|Collection|Builder|array|null {
        return Player::query()->find($id);
    }

    /**
     * Update an existing Player
     * @param Player $player
     * @param array $data
     * @return Player
     */
    public function update(Player $player, array $data): Player
    {
        $player->update($data);
        return $player;
    }

    /**
     * Delete an existing player
     * @param Player $player
     * @return bool|null
     */
    public function delete(Player $player): ?bool
    {
        return $player->delete();
    }
}
