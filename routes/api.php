<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "country"], function ($router) {
    Route::get('/', \App\Http\Controllers\Country\CountryIndexController::class);
    Route::get('/fullcollection', [\App\Http\Controllers\Country\CountryIndexController::class, 'getAllFull']);
    Route::get('/latest', [\App\Http\Controllers\Country\CountryIndexController::class, 'getLatest']);
    Route::get('/{country}', [\App\Http\Controllers\Country\CountryIndexController::class, 'getById'])->whereNumber('country');
    Route::post('/create', \App\Http\Controllers\Country\CountryCreateController::class);
    Route::post('/{country}/update', \App\Http\Controllers\Country\CountryUpdateController::class);
    Route::post('/{country}/delete', \App\Http\Controllers\Country\CountryDeleteController::class);
});

Route::group(["prefix" => "tournament"], function ($router) {
    Route::get('/', \App\Http\Controllers\Tournament\TournamentIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Tournament\TournamentIndexController::class, 'getLatest']);
    Route::get('/{tournament}', [\App\Http\Controllers\Tournament\TournamentIndexController::class, 'getById'])->whereNumber('tournament');
    Route::post('/create', \App\Http\Controllers\Tournament\TournamentCreateController::class);
    Route::post('/{tournament}/update', \App\Http\Controllers\Tournament\TournamentUpdateController::class);
    Route::post('/{tournament}/delete', \App\Http\Controllers\Tournament\TournamentDeleteController::class);
    Route::get('/{tournament}/clubs/', \App\Http\Controllers\Tournament\TournamentClubsController::class);
    Route::post('/{tournament}/clubs/set', [\App\Http\Controllers\Tournament\TournamentClubsController::class, 'setClubs']);
});

Route::group(["prefix" => "club"], function ($router) {
    Route::get('/', \App\Http\Controllers\Club\ClubIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Club\ClubIndexController::class, 'getLatest']);
    Route::get('/{club}', [\App\Http\Controllers\Club\ClubIndexController::class, 'getById'])->whereNumber('club');
    Route::get('/by-countries', [\App\Http\Controllers\Club\ClubIndexController::class, 'getByCountries']);
    Route::post('/create', \App\Http\Controllers\Club\ClubCreateController::class);
    Route::post('/{club}/update', \App\Http\Controllers\Club\ClubUpdateController::class);
    Route::post('/{club}/delete', \App\Http\Controllers\Club\ClubDeleteController::class);
});

Route::group(["prefix" => "player"], function ($router) {
    Route::get('/', \App\Http\Controllers\Player\PlayerIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Player\PlayerIndexController::class, 'getLatest']);
    Route::get('/{player}', [\App\Http\Controllers\Player\PlayerIndexController::class, 'getById']);
    Route::post('/create', \App\Http\Controllers\Player\PlayerCreateController::class);
    Route::post('/{player}/update', \App\Http\Controllers\Player\PlayerUpdateController::class);
    Route::post('/{player}/delete', \App\Http\Controllers\Player\PlayerDeleteController::class);
});

Route::group(["prefix" => "manager"], function ($router) {
    Route::get('/',\App\Http\Controllers\Manager\ManagerIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Manager\ManagerIndexController::class, 'getLatest']);
    Route::get('/{manager}', [\App\Http\Controllers\Manager\ManagerIndexController::class, 'getById']);
    Route::post('/create', \App\Http\Controllers\Manager\ManagerCreateController::class);
    Route::post('/{manager}/update', \App\Http\Controllers\Manager\ManagerUpdateController::class);
    Route::post('/{manager}/delete', \App\Http\Controllers\Manager\ManagerDeleteController::class);
});

Route::group(["prefix" => "stadium"], function ($router) {
    Route::get('/', \App\Http\Controllers\Stadium\StadiumIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Stadium\StadiumIndexController::class, 'getLatest']);
    Route::get('/{stadium}', [\App\Http\Controllers\Stadium\StadiumIndexController::class, 'getById']);
    Route::post('/create', \App\Http\Controllers\Stadium\StadiumCreateController::class);
    Route::post('/{stadium}/update', \App\Http\Controllers\Stadium\StadiumUpdateController::class);
    Route::post('/{stadium}/delete', \App\Http\Controllers\Stadium\StadiumDeleteController::class);
});

Route::group(["prefix" => "game"], function ($router) {
    Route::get('/', \App\Http\Controllers\Game\GameIndexController::class);
    Route::get('/latest', [\App\Http\Controllers\Game\GameIndexController::class, 'getLatest']);
    Route::get('/{game}', [\App\Http\Controllers\Game\GameIndexController::class, 'getById'])->whereNumber('game');
    Route::get('/by-tournaments', [\App\Http\Controllers\Game\GameIndexController::class, 'getByTournaments']);
    Route::get('/live', [\App\Http\Controllers\Game\GameIndexController::class, 'getLiveGames']);
    Route::post('/create', \App\Http\Controllers\Game\GameCreateController::class);
    Route::post('/{game}/update', \App\Http\Controllers\Game\GameUpdateController::class);
    Route::post('/{game}/delete', \App\Http\Controllers\Game\GameDeleteController::class);
});

Route::group(["prefix" => "auth", "middleware" => "api"], function ($router) {
    Route::post('/login', \App\Http\Controllers\Auth\LoginController::class);
    Route::post('/register', \App\Http\Controllers\Auth\RegisterController::class);
    Route::post('/refresh', \App\Http\Controllers\Auth\RefreshController::class);
    Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class);
    Route::post('/me', \App\Http\Controllers\Auth\MeController::class);
});
