<?php

use EscolaLms\Tags\Http\Controllers\TagsAPIController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/tags'], function () {
    Route::post('/', [TagsAPIController::class, 'create']);
    Route::get('/', [TagsAPIController::class, 'index']);
});
