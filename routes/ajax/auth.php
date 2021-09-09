<?php

Route::prefix('role')->group(function () {
    Route::get('all', 'RoleController@manifest');
    Route::get('', 'RoleController@index');
    Route::get('{id}', 'RoleController@show');
    Route::post('', 'RoleController@store');
    Route::put('', 'RoleController@amend');
    Route::patch('activate', 'RoleController@reviseActivate');
    Route::patch('deactivate', 'RoleController@reviseDeactivate');
    Route::delete('', 'RoleController@destroy');
});

Route::prefix('user')->group(function () {
    Route::get('all', 'UserController@manifest');
    Route::get('', 'UserController@index');
    Route::get('{id}', 'UserController@show');
    Route::post('', 'UserController@store');
    Route::put('', 'UserController@amend');
    Route::patch('activate', 'UserController@reviseActivate');
    Route::patch('deactivate', 'UserController@reviseDeactivate');
    Route::patch('password', 'UserController@revisePassword');
    Route::delete('', 'UserController@destroy');
});
