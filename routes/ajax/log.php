<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication_log')->group(function () {
    Route::get('all', 'AuthenticationLogController@manifest');
    Route::get('', 'AuthenticationLogController@index');
    Route::get('{id}', 'AuthenticationLogController@show');
    Route::post('logout', 'AuthenticationLogController@storeLogout');
    Route::delete('', 'AuthenticationLogController@destroy');
    Route::prefix('widget')->group(function () {
        Route::get('latest', 'AuthenticationLogController@revealLatest');
        Route::get('traffic', 'AuthenticationLogController@revealTraffic');
    });
    Route::prefix('report')->group(function () {
        Route::get('', 'AuthenticationLogController@discloseIndex');
    });
});

Route::prefix('activity_log')->group(function () {
    Route::get('all', 'ActivityLogController@manifest');
    Route::get('', 'ActivityLogController@index');
    Route::get('{id}', 'ActivityLogController@show');
    Route::delete('', 'ActivityLogController@destroy');
    Route::prefix('widget')->group(function () {
        Route::get('latest', 'ActivityLogController@revealLatest');
        Route::get('traffic', 'ActivityLogController@revealTraffic');
    });
    Route::prefix('report')->group(function () {
        Route::get('', 'ActivityLogController@discloseIndex');
    });
});
