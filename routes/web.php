<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\BindMenuData;
use Illuminate\Support\Facades\Route;

Route::middleware([BindMenuData::class])->group(function () {
    Route::get('/', function () {
        return view('main');
    })->name('main');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/registration', [RegistrationController::class, 'register'])->name('registration');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/auth', [LoginController::class, 'login'])->name('auth');

    Route::get('/search', [SearchController::class, 'search'])->name('search');

    Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');

    Route::post('/favorite/add', [FavoriteController::class, 'add'])->name('favorite.add');

    Route::post('/favorite/remove', [FavoriteController::class, 'remove'])->name('favorite.remove');

    Route::get('/catalog', [CatalogController::class, 'showCatalogForm'])->name('catalog');

    Route::post('/catalog', [CatalogController::class, 'getFilteredGames'])->name('catalog.filter');

    Route::get('/profile', [ProfileController::class, 'showUser'])->name('profile');

});
