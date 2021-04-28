<?php

use EscolaLms\Tags\Http\Controllers\TagsAPIController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/tags'], function () {
    Route::get('/', [TagsAPIController::class, 'index']);
    Route::get('unique', [TagsAPIController::class, 'unique']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/', [TagsAPIController::class, 'create']);
        Route::delete('/', [TagsAPIController::class, 'destroy']);
    });

    Route::group(['middleware' => [\Illuminate\Routing\Middleware\SubstituteBindings::class]], function () {
        Route::get('{tag}', [TagsAPIController::class, 'show']);
    });
});
