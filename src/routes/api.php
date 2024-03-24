<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\Olx\OlxController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('parser-olx', [OlxController::class, 'store'])->name("olx_parser");
Route::post('home', [HomeController::class, 'index'])->name("home");
