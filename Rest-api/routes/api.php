<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Builder\Stub;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// route menmpikan seluruh data 
Route::get('/animal', [AnimalController::class, 'index']);
// route menmbhakan data
Route::post('/animal', [AnimalController::class, 'store']);
// route unutk update data
Route::put('/animal/{id}', [AnimalController::class, 'update']);
// route untuk haps data
Route::delete('/animal/{id}', [AnimalController::class, 'destroy']);

//==================================================================
Route::middleware(['auth:sanctum'])->group(function(){
    // data student nf
    //get all resource
    // Membuat enpoint students dan menambahkan authentication santum
    Route::get('/students', [StudentController::class, 'index']);
    // add resouce dengan method post
    Route::post('/students', [StudentController::class, 'store']);
    // get detail resource student method get
    Route::get('/students/{id}', [StudentController::class, 'show']);
    //update data resource student method put
    Route::put('/students/{id}', [StudentController::class, 'update']);
    //menghapus resource student
    //method delete
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    
});
//membuat Route untuk Register dan Login
Route::post('/register', [AuthController::class, 'register']);
//login
Route::post('/login', [AuthController::class, 'login']);

