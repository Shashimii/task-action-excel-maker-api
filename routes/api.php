<?php

use App\Http\Controllers\AssginedController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\AuthController;
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

// User login
Route::get('/sanctum/csrf-cookie', [AuthController::class, 'csrfCookie']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

// fetch data
Route::get('/fetchDuties', [DutyController::class, 'fetchAll']);
Route::get('/fetchOfficers', [OfficerController::class, 'fetchAll']);
Route::get('/fetchAssigned', [AssginedController::class, 'fetchAll']);

// post data
Route::post('/addAssigned', [AssginedController::class, 'storeAssigned']);
Route::post('/addOfficer', [OfficerController::class, 'storeOfficer']);
Route::post('/addDuty', [DutyController::class, 'storeDuty']);

// edit data
Route::patch('/editOfficer/{id}', [OfficerController::class, 'editOfficer']);
Route::patch('/editDuty/{id}', [DutyController::class, 'editDuty']);

// delete data
Route::delete('/deleteAssigned/{id}', [AssginedController::class, 'deleteAssigned']);
Route::delete('/deleteOfficer/{id}', [OfficerController::class, 'deleteOfficer']);
Route::delete('/deleteDuty/{id}', [DutyController::class, 'deleteDuty']);

