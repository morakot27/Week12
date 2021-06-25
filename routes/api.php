<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDolistController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::get('/todolist', [TodolistController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/todolist', [TodolistController::class, 'store']);
    Route::put('/todolist/{id}', [TodolistController::class, 'update']);
    Route::delete('/todolist/{id}', [TodolistController::class, 'destory']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
