<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = "games";

    protected $fillable = [
        "name",
        "home",
        "guest",
        "home_score",
        "guest_score",
        "date",
        "stadium_id",
        "tournament_id"
    ];

    protected $dates = ["date"];

    public function team_guest()
    {
        return $this->belongsTo(Club::class, 'guest');
    }

    public function team_home()
    {
        return $this->belongsTo(Club::class, 'home');
    }

    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
