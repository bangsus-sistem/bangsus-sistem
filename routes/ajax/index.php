<?php

use Illuminate\Support\Facades\Route;

// Route with none auth guard.
Route::prefix('')->group(__DIR__.'/misc.php');

/**
 * @package \Waffleboss\Library\Http\Controllers\Ajax\Utils
 */
Route::prefix('utils')->namespace('Utils')->group(__DIR__.'/utils.php');

// Route with sanctum auth middleware.
Route::middleware('auth:sanctum')->group(function () {
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Log
     */
    Route::prefix('log')->namespace('Log')->group(__DIR__.'/log.php');
});
