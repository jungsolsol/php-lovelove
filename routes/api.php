<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ImageController;

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
/**
 * Login 관련 route
 */
Route::prefix('/auth')->group(function () {
Route::post('/login/google', [LoginController::class, 'redirectToProvider']);
Route::post('/login/google/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware('auth:api')->group(function() {
Route::get('logout', [LoginController::class, 'logout']);
Route::get('user', [LoginController::class, 'user']);
});
});

/**
 * Member 관련 route
 */
Route::get('/profile/{id}', [MemberController::class, 'index']);
Route::post('/profile/{id}', [MemberController::class, 'create']);
Route::put('/profile/{id}', [MemberController::class,'edit']);
Route::delete('/profile/{id}', [MemberController::class, 'delete']);

/**
 * Map 관련 route
 */

Route::get('/maps', [MapController::class, 'index']);
Route::post('/maps', [MapController::class, 'create']);

/**
 * Image 관련 route
 */
Route::post('/image', [ImageController::class, 'create']);
