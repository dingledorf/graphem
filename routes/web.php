<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/{path?}', 'app');

Route::redirect('/', '/myheroes');

Route::prefix('myheroes')->group(function () {
    Route::get('/', 'MyHeroesController@myTeams');
    Route::get('/createhero', 'MyHeroesController@createHeroForm');
    Route::get('/createteam', 'MyHeroesController@createTeamForm');
    Route::post('/storehero', 'MyHeroesController@storeHero');
    Route::post('/storeteam', 'MyHeroesController@storeTeam');
});
