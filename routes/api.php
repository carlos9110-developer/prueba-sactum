<?php

use App\Http\Controllers\UserController;
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


Route::post('/login', [UserController::class, 'login']);

Route::post('/prueba', [UserController::class, 'prueba'])->middleware(['auth:sanctum', 'ability:server-update,place-orders']); // para 
Route::post('/prueba2', [UserController::class, 'prueba2'])->middleware(['auth:sanctum', 'abilities:server-update,place-orders']);
Route::post('/prueba3', [UserController::class, 'prueba3'])->middleware('auth:sanctum');



