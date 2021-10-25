<?php

use Illuminate\Support\Facades\Route;

Route::prefix('salary')->group(function () {
    Route::get('', 'SalaryController@index');
});
