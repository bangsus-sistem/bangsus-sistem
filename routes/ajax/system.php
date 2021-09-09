<?php

use Illuminate\Support\Facades\Route;

Route::prefix('branch_type')->group(function () {
    Route::get('all', 'BranchTypeController@manifest');
    Route::get('', 'BranchTypeController@index');
    Route::get('{id}', 'BranchTypeController@show');
    Route::post('', 'BranchTypeController@store');
    Route::put('', 'BranchTypeController@amend');
    Route::patch('activate', 'BranchTypeController@reviseActivate');
    Route::patch('deactivate', 'BranchTypeController@reviseDeactivate');
    Route::delete('', 'BranchTypeController@destroy');
});

Route::prefix('branch')->group(function () {
    Route::get('all', 'BranchController@manifest');
    Route::get('', 'BranchController@index');
    Route::get('{id}', 'BranchController@show');
    Route::post('', 'BranchController@store');
    Route::put('', 'BranchController@amend');
    Route::patch('activate', 'BranchController@reviseActivate');
    Route::patch('deactivate', 'BranchController@reviseDeactivate');
    Route::delete('', 'BranchController@destroy');
});
