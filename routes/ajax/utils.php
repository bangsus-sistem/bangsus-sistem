<?php

use Illuminate\Support\Facades\Route;

Route::get('authenticated', 'AuthenticatedController@index');
Route::get('version_check', 'VersionCheckController@index');
Route::get('language_resources', 'LanguageResourcesController@index');
Route::get('authorization', 'AuthorizationController@index');
Route::get('csrf_cookie', 'CsrfCookieController@show');
