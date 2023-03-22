<?php

namespace App\Http\Resources\Country;

use App\Http\Resources\Club\ClubMainCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryWithClubsResource extends JsonResource
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
            "clubs" => new ClubMainCollection($this->clubs)
        ];
    }
}
