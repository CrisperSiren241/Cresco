<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $table = "game";
    use HasFactory;

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function lang_support()
    {
        return $this->belongsTo(lang_support::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function likes()
    {
        return $this->hasMany(game_like::class, 'game_id');
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'game_like', 'Game_id', 'User_id');
    }


}
