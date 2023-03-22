<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;
    protected $table = 'stadiums';
    protected $fillable = [
        "name",
        "founding",
        "club_id",
        "country_id",
    ];

    public function club(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Club::class);
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Country::class);
    }
}
