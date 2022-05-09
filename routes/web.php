<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [frontendController::class, 'home']);
Route::get('/user/register', [AuthController::class, 'register']);
Route::post('/registerSubmit',[AuthController::class, 'registerSubmit']);
Route::get('/logoutSubmit',[AuthController::class, 'logout']);

Route::get('/user/login', [AuthController::class, 'login']);
Route::post('/loginSubmit',[AuthController::class, 'loginSubmit']);




