<?php

namespace App\Http\Resources\Stadium;

use App\Http\Resources\Club\ClubMainResource;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StadiumFullResource extends JsonResource
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
            "club" => new ClubMainResource($this->club)
        ];
    }
}
