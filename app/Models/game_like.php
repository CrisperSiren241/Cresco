<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game_like extends Model
{
    use HasFactory;

    protected $table = "game_like";

    protected $fillable = ['user_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
