<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\TechnologyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::apiResource('destinations', DestinationController::class);
Route::apiResource('crews', CrewController::class);
Route::apiResource('technologies', TechnologyController::class);

