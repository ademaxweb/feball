<?php

namespace App\Http\Resources\Country;

use App\Http\Resources\Club\ClubMainCollection;
use App\Http\Resources\Manager\ManagerMainCollection;
use App\Http\Resources\Player\PlayerMainCollection;
use App\Http\Resources\Stadium\StadiumFullCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryFullResource extends JsonResource
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
            "clubs" => new ClubMainCollection($this->clubs),
            "stadiums" => new StadiumFullCollection($this->stadiums),
            "players" => new PlayerMainCollection($this->players),
            "managers" => new ManagerMainCollection($this->managers)
        ];
    }
}
