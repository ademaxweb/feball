<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentMainResource extends JsonResource
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
            "clubs_count" => $this->clubs->count()
        ];
    }
}
