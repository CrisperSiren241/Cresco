<?php

namespace App\Http\Controllers;

use App\Models\game_like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $favoriteGames = $user->likedGames;
            return view('profile', ['games' => $favoriteGames]);
        }

        return view('login');
    }
}
