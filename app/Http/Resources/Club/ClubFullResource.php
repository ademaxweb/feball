<?php

namespace App\Http\Resources\Club;

use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Manager\ManagerFullResource;
use App\Http\Resources\Manager\ManagerMainResource;
use App\Http\Resources\Manager\ManagerResource;
use App\Http\Resources\Player\PlayerCollection;
use App\Http\Resources\Player\PlayerMainCollection;
use App\Http\Resources\Stadium\StadiumMainResource;
use App\Http\Resources\Stadium\StadiumResource;
use App\Http\Resources\Tournament\TournamentMainCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubFullResource extends JsonResource
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
            "founding" => $this->founding,
            "country" => new CountryResource($this->country),
            "manager" => new ManagerMainResource($this->manager),
            "players" => new PlayerMainCollection($this->players),
            "stadium" => new StadiumMainResource($this->stadium),
            "tournaments" => new TournamentMainCollection($this->tournaments),
        ];
    }
}
