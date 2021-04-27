<?php

use EscolaLms\Tags\Http\Controllers\TagsAPIController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/tags', 'middleware' => [\Illuminate\Routing\Middleware\SubstituteBindings::class]], function () {
    Route::post('/', [TagsAPIController::class, 'create']);
    Route::get('/', [TagsAPIController::class, 'index']);

    Route::get('{tag}', [TagsAPIController::class, 'show']);
});
