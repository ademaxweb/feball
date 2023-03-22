<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\Club\ClubMainResource;
use App\Http\Resources\Stadium\StadiumMainResource;
use App\Http\Resources\Tournament\TournamentMainResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GameFullResource extends JsonResource
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
            "home" => new ClubMainResource($this->team_home),
            "guest" => new ClubMainResource($this->team_guest),
            "date" => $this->date,
            "home_score" => $this->home_score,
            "guest_score" => $this->guest_score,
            "stadium" => new StadiumMainResource($this->stadium),
            "tournament" => new TournamentMainResource($this->tournament)
        ];
    }
}
