<?php

namespace App\Services;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    /**
     * @return Collection
     */
    public function getAll(): Collection {
        return Game::all();
    }

    /**
     * Get the latest Game
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null {
        return Game::query()->latest()->first();
    }

    /**
     * Get the Game by ID
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function getById(int $id): Model|Collection|Builder|array|null {
        return Game::query()->find($id);
    }

    /**
     * Create a new Game
     * @param array $data
     * @return Model|Builder|bool
     */
    public function store(array $data): Model|Builder|bool {
        if (($data["guest"] != $data["home"]) && $data["guest"] && $data["home"])
        {
            return Game::query()->create($data);
        } else {
            return false;
        }
    }

    /**
     * Update an existing Game
     * @param Game $game
     * @param array $data
     * @return Game
     */
    public function update(Game $game, array $data): Game {
        $game->update($data);
        return $game;
    }

    /**
     * Delete an existing Game
     * @param Game $game
     * @return bool|null
     */
    public function delete(Game $game): ?bool {
        return $game->delete();
    }

    /**
     * Get live games
     * @return Collection|array
     */
    public function getLive(): Collection|array {
        return Game::query()
            ->whereBetween("date", [Carbon::now()->subMinutes(180), Carbon::now()->addMinutes(5)])
            ->orderBy("date")
            ->get();
    }
}
