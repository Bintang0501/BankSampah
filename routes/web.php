<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AutentikasiController;
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

Route::get("/", [AppController::class, "dashboard"]);

Route::prefix('login')->group(function () {
    Route::get("/", [AutentikasiController::class, "login"]);
    Route::post("/", [AutentikasiController::class, "post_login"]);
});