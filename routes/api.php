<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;

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
//Route::get('/auth/login/google', [LoginController::class, 'redirectToProvider']);
//Route::get('/auth/login/google/callback', [LoginController::class, 'handleProviderCallback']);
Route::prefix('/auth')->group(function () {
Route::post('/login/google', [LoginController::class, 'redirectToProvider']);
Route::post('/login/google/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware('auth:api')->group(function() {
//    Route::get('logout', 'AuthController@logout');
    Route::get('user', [LoginController::class, 'user']);
});
});
/**
 * Member 관련 route
 */
Route::get('/profile/{id}', [MemberController::class, 'index']);
Route::post('/profile', [MemberController::class, 'create']);
//Route::get('/profile/{id}', [MemberController::class,'get']);
