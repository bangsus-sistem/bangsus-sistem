<?php

use Illuminate\Support\Facades\Route;

Route::prefix('unit')->group(function () {
    Route::get('all', 'UnitController@manifest');
    Route::get('', 'UnitController@index');
    Route::get('{id}', 'UnitController@show');
    Route::post('', 'UnitController@store');
    Route::put('', 'UnitController@amend');
    Route::patch('activate', 'UnitController@reviseActivate');
    Route::patch('deactivate', 'UnitController@reviseDeactivate');
    Route::delete('', 'UnitController@destroy');
});

Route::prefix('production_type')->group(function () {
    Route::get('all', 'ProductionTypeController@manifest');
    Route::get('', 'ProductionTypeController@index');
    Route::get('{id}', 'ProductionTypeController@show');
    Route::post('', 'ProductionTypeController@store');
    Route::put('', 'ProductionTypeController@amend');
    Route::patch('activate', 'ProductionTypeController@reviseActivate');
    Route::patch('deactivate', 'ProductionTypeController@reviseDeactivate');
    Route::delete('', 'ProductionTypeController@destroy');
});

Route::prefix('operational_photo_type')->group(function () {
    Route::get('all', 'OperationalPhotoTypeController@manifest');
    Route::get('', 'OperationalPhotoTypeController@index');
    Route::get('{id}', 'OperationalPhotoTypeController@show');
    Route::post('', 'OperationalPhotoTypeController@store');
    Route::put('', 'OperationalPhotoTypeController@amend');
    Route::patch('activate', 'OperationalPhotoTypeController@reviseActivate');
    Route::patch('deactivate', 'OperationalPhotoTypeController@reviseDeactivate');
    Route::delete('', 'OperationalPhotoTypeController@destroy');
});

Route::prefix('operational_photo_penalty_type')->group(function () {
    Route::get('all', 'OperationalPhotoPenaltyTypeController@manifest');
    Route::get('', 'OperationalPhotoPenaltyTypeController@index');
    Route::get('{id}', 'OperationalPhotoPenaltyTypeController@show');
    Route::post('', 'OperationalPhotoPenaltyTypeController@store');
    Route::put('', 'OperationalPhotoPenaltyTypeController@amend');
    Route::patch('activate', 'OperationalPhotoPenaltyTypeController@reviseActivate');
    Route::patch('deactivate', 'OperationalPhotoPenaltyTypeController@reviseDeactivate');
    Route::delete('', 'OperationalPhotoPenaltyTypeController@destroy');
});

Route::prefix('minimum_operational_photo')->group(function () {
    Route::get('{id}', 'MinimumOperationalPhotoController@show');
    Route::put('', 'MinimumOperationalPhotoController@amend');
});

Route::prefix('quality_control_type')->group(function () {
    Route::get('all', 'QualityControlTypeController@manifest');
    Route::get('', 'QualityControlTypeController@index');
    Route::get('{id}', 'QualityControlTypeController@show');
    Route::post('', 'QualityControlTypeController@store');
    Route::put('', 'QualityControlTypeController@amend');
    Route::patch('activate', 'QualityControlTypeController@reviseActivate');
    Route::patch('deactivate', 'QualityControlTypeController@reviseDeactivate');
    Route::delete('', 'QualityControlTypeController@destroy');
});

Route::prefix('disciplinary_parameter')->group(function () {
    Route::get('all', 'DisciplinaryParameterController@manifest');
    Route::get('', 'DisciplinaryParameterController@index');
    Route::get('{id}', 'DisciplinaryParameterController@show');
    Route::post('', 'DisciplinaryParameterController@store');
    Route::put('', 'DisciplinaryParameterController@amend');
    Route::patch('activate', 'DisciplinaryParameterController@reviseActivate');
    Route::patch('deactivate', 'DisciplinaryParameterController@reviseDeactivate');
    Route::delete('', 'DisciplinaryParameterController@destroy');
});

Route::prefix('disciplinary_value')->group(function () {
    Route::post('', 'DisciplinaryValueController@store');
    Route::put('', 'DisciplinaryValueController@amend');
    Route::delete('', 'DisciplinaryValueController@destroy');
});

Route::prefix('general_cleaning_activity')->group(function () {
    Route::get('all', 'GeneralCleaningActivityController@manifest');
    Route::get('', 'GeneralCleaningActivityController@index');
    Route::get('{id}', 'GeneralCleaningActivityController@show');
    Route::post('', 'GeneralCleaningActivityController@store');
    Route::put('', 'GeneralCleaningActivityController@amend');
    Route::patch('activate', 'GeneralCleaningActivityController@reviseActivate');
    Route::patch('deactivate', 'GeneralCleaningActivityController@reviseDeactivate');
    Route::delete('', 'GeneralCleaningActivityController@destroy');
});

Route::prefix('marketing_activity')->group(function () {
    Route::get('all', 'MarketingActivityController@manifest');
    Route::get('', 'MarketingActivityController@index');
    Route::get('{id}', 'MarketingActivityController@show');
    Route::post('', 'MarketingActivityController@store');
    Route::put('', 'MarketingActivityController@amend');
    Route::patch('activate', 'MarketingActivityController@reviseActivate');
    Route::patch('deactivate', 'MarketingActivityController@reviseDeactivate');
    Route::delete('', 'MarketingActivityController@destroy');
});

Route::prefix('marketing_item')->group(function () {
    Route::get('all', 'MarketingItemController@manifest');
    Route::get('', 'MarketingItemController@index');
    Route::get('{id}', 'MarketingItemController@show');
    Route::post('', 'MarketingItemController@store');
    Route::put('', 'MarketingItemController@amend');
    Route::patch('activate', 'MarketingItemController@reviseActivate');
    Route::patch('deactivate', 'MarketingItemController@reviseDeactivate');
    Route::delete('', 'MarketingItemController@destroy');
});
