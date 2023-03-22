<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function clubs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Club::class);
    }

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Player::class);
    }

    public function managers(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Manager::class);
    }

    public function stadiums(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Stadium::class);
    }
}
