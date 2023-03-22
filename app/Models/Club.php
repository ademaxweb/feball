<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "founding", "country_id",
        ];

    protected $dates = [
        "founding",
        ];

    public function stadium(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(Stadium::class);
    }

    public function manager(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(Manager::class);
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Country::class);
    }

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Player::class);
    }

    public function tournaments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tournament::class);
    }
}
