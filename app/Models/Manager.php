<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surname",
        "birth",
        "country_id",
        "club_id",
    ];

    protected $dates = [
        "birth",
    ];

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Country::class);
    }

    public function club(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Club::class);
    }
}
