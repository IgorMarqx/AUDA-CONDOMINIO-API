§<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\condominium\CondominiumController;

Route::get('ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('unauthorized', function () {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('api.unauthorized');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('condominium', CondominiumController::class);
});
