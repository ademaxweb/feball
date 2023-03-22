<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = "positions";

    protected $fillable = ["name"];

    protected $hidden = ["created_at", "updated_at"];

    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Player::class);
    }
}
