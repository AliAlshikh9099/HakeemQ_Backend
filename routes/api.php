<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Models\doctor;
use App\Models\Doctor as ModelsDoctor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('logout',[AuthController::class,'logout']);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register','register');
    Route::post('/login','login');
    
});

Route::get('doctors', function () {
    $doctors=doctor::all();
    return $doctors;
    
});

