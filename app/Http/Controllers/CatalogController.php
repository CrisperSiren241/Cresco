<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\game;
use App\Models\genre;
use App\Models\platform;
use App\Models\producer;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function showCatalogForm()
    {
        $platforms = platform::all();
        $genres = genre::all();
        $producers = producer::all();
        $games = game::all();

        return view('catalog', compact('platforms', 'genres', 'producers', 'games'));
    }

    public function getFilteredGames(Request $request)
    {
        $platforms = platform::all();
        $genres = genre::all();
        $producers = producer::all();

        $query = game::query();

        if ($request->has('platform') && $request->platform != '') {
            $query->where('platform_id', $request->platform);
        }

        if ($request->has('genre') && $request->genre != '') {
            $query->where('genre_id', $request->genre);
        }

        if ($request->has('producer') && $request->producer != '') {
            $query->where('producer_id', $request->producer);
        }

        if ($request->has('year') && $request->year != '') {
            $query->where('date', $request->year);
        }

        if ($request->filled('price_from') || $request->filled('price_to')) {
            $priceFrom = $request->filled('price_from') ? $request->price_from : 0;
            $priceTo = $request->filled('price_to') ? $request->price_to : PHP_INT_MAX;

            if (!$request->filled('price_from')) {
                $query->whereRaw("price * (1 - discount / 100) <= $priceTo");
            }
            if (!$request->filled('price_to')) {
                $query->whereRaw("price * (1 - discount / 100) >= $priceFrom");
            } else {
                $query->whereRaw("price * (1 - discount / 100) BETWEEN $priceFrom AND $priceTo");
            }
        }

        $games = $query->get();

        return view('catalog', compact('platforms', 'genres', 'producers', 'games'));

    }
}
