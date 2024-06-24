<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchText = $request->input('search_text');
        $games = game::where('title', 'like', '%' . $searchText . '%')->get();
        return view('search_results', ['games' => $games, 'searchText' =>$searchText]);
    }
}
