<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = "players";

    protected $fillable = [
        "name",
        "surname",
        "birth",
        "position_id",
        "number",
        "club_id",
        "country_id"
    ];

    protected $dates = [
        "birth",
    ];

    public function position(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Position::class);
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Country::class);
    }

    public function club(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Club::class);
    }

}
