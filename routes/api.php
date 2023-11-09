<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;


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


Route::get('/data', [APIController::class, 'getData']);
Route::post('/login', [APIController::class, 'login']);
Route::post('/logout', [APIController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [APIController::class, 'register']);
