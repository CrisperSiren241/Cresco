<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $game = game::findOrFail($request->game_id);
        $user = auth()->user();

        if (!$game->likes()->where('user_id', $user->id)->exists()) {
            $game->likes()->create(['user_id' => $user->id]);
        }

        return response()->json(['status' => 'added']);
    }

    public function remove(Request $request)
    {
        $game = game::findOrFail($request->game_id);
        $user = auth()->user();

        $game->likes()->where('user_id', $user->id)->delete();

        return response()->json(['status' => 'removed']);
    }
}
