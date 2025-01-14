<?php

use App\Http\Controllers\AssginedController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\OfficerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// fetch data
Route::get('/fetchDuties', [DutyController::class, 'fetchAll']);
Route::get('/fetchOfficers', [OfficerController::class, 'fetchAll']);
Route::get('/fetchAssigned', [AssginedController::class, 'fetchAll']);

// post data
Route::post('/addAssigned', [AssginedController::class, 'storeAssigned']);

