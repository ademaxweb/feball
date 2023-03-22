<?php

namespace App\Http\Resources\Manager;

use App\Http\Resources\Club\ClubMainResource;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagerFullResource extends JsonResource
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
            "surname" => $this->surname,
            "birth" => $this->birth,
            "country" => new CountryResource($this->country),
            "club" => new ClubMainResource($this->country)
        ];
    }
}
