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
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Auth
     */
    Route::prefix('auth')->namespace('Auth')->group(__DIR__.'/auth.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\System
     */
    Route::prefix('system')->namespace('System')->group(__DIR__.'/system.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Master
     */
    Route::prefix('master')->namespace('Master')->group(__DIR__.'/master.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Hrm
     */
    Route::prefix('hrm')->namespace('Hrm')->group(__DIR__.'/hrm.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Penalty
     */
    Route::prefix('penalty')->namespace('Penalty')->group(__DIR__.'/penalty.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Operational
     */
    Route::prefix('operational')->namespace('Operational')->group(__DIR__.'/operational.php');
    
    /**
     * @package \Waffleboss\Library\Http\Controllers\Ajax\Report
     */
    Route::prefix('report')->namespace('Report')->group(__DIR__.'/report.php');
});
