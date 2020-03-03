<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home')->name('home');

Route::post('/', 'PagesController@crear')->name('crear');

Route::post('/game', 'GamesController@game')->name('game');

Route::post('/pointup', 'GamesController@pointup')->name('pointup');

Route::post('/endgame', 'GamesController@endgame')->name('endgame');