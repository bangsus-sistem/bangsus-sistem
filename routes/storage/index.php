<?php

use Illuminate\Support\Facades\Route;

Route::prefix('image')->group(function () {
    Route::get('{id}', 'ImageController@show')->name('storage.image.show');
    Route::post('', 'ImageController@store');
    Route::delete('{id}', 'ImageController@destroy');
});
Route::get('file/{id}', 'FileController@show')->name('storage.file');
