<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Permission\PermissionCollection;
use App\Http\Resources\Role\RoleCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "email" => $this->email,
            "roles" => new RoleCollection($this->roles),
            "permissions" => new PermissionCollection($this->permissions())
        ];
    }
}
