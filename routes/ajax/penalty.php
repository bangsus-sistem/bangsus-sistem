<?php

use Illuminate\Support\Facades\Route;

Route::prefix('common_penalty')->group(function () {
    Route::get('all', 'CommonPenaltyController@manifest');
    Route::get('', 'CommonPenaltyController@index');
    Route::get('{id}', 'CommonPenaltyController@show');
    Route::post('', 'CommonPenaltyController@store');
    Route::put('', 'CommonPenaltyController@amend');
    Route::patch('activate', 'CommonPenaltyController@reviseActivate');
    Route::patch('deactivate', 'CommonPenaltyController@reviseDeactivate');
    Route::delete('', 'CommonPenaltyController@destroy');
});

Route::prefix('material_penalty')->group(function () {
    Route::get('all', 'MaterialPenaltyController@manifest');
    Route::get('', 'MaterialPenaltyController@index');
    Route::get('{id}', 'MaterialPenaltyController@show');
    Route::post('', 'MaterialPenaltyController@store');
    Route::put('', 'MaterialPenaltyController@amend');
    Route::patch('activate', 'MaterialPenaltyController@reviseActivate');
    Route::patch('deactivate', 'MaterialPenaltyController@reviseDeactivate');
    Route::delete('', 'MaterialPenaltyController@destroy');
});
