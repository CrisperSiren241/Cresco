<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\game_like;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($id)
    {
        $game = Game::with([
            'genre',
            'platform',
            'producer',
            'lang_support',
            'region',
            'service'
        ])->findOrFail($id);

        $isFavorite = false;
        if (auth()->check()) {
            $user_id = auth()->id();
            $isFavorite = $game->likes()->where('user_id', $user_id)->exists();
        }

        return view('game', ['game' => $game, 'isFavorite' => $isFavorite]);
    }

}
