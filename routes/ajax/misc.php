<?php

use Illuminate\Support\Facades\Route;

Route::prefix('log/authentication_log')->group(function () {
    Route::post('login', 'Log\AuthenticationLogController@storeLogin');
});
