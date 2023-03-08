<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\LoginController;

Route::get('/', function () { return view('init');});

Route::get('/auth/login/google', [LoginController::class, 'redirectToProvider']);
Route::get('/auth/login/google/callback', [LoginController::class, 'handleProviderCallback']);
