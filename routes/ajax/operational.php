<?php

use Illuminate\Support\Facades\Route;

Route::prefix('operational_photo')->group(function () {
    Route::get('all', 'OperationalPhotoController@manifest');
    Route::get('', 'OperationalPhotoController@index');
    Route::get('{id}', 'OperationalPhotoController@show');
    Route::post('', 'OperationalPhotoController@store');
    Route::put('', 'OperationalPhotoController@amend');
    Route::patch('activate', 'OperationalPhotoController@reviseActivate');
    Route::patch('deactivate', 'OperationalPhotoController@reviseDeactivate');
    Route::delete('', 'OperationalPhotoController@destroy');
});