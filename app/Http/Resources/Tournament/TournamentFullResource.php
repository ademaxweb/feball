<?php

namespace App\Http\Resources\Tournament;

use App\Http\Resources\Club\ClubMainCollection;
use App\Http\Resources\Game\GameFullCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "clubs_count" => $this->clubs->count(),
            "clubs" => new ClubMainCollection($this->clubs),
            "games" => new GameFullCollection($this->games),
        ];
    }
}
