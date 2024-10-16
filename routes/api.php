<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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
Route::post('/add-student',[StudentController::class, "store"]);


Route::get("/students",[StudentController::class,"index"]);

Route::get("/students/{id}",[StudentController::class,"show"]);

Route::put('/students/{id}',[StudentController::class,'update']);

Route::delete('/students/{id}',[StudentController::class,'destroy']);

//API routes for users table
Route::post('/register',[AuthController::class,'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


