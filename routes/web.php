<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\JenisSampahController;
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

Route::get("/", [AppController::class, "input_jenis_sampah"]);
Route::post("/input-jenis-sampah", [AppController::class, "post_jenis_sampah"]);

Route::get("/dashboard", [AppController::class, "dashboard_user"]);

Route::group(["middleware" => ["guest"]], function() {
    Route::prefix('login')->group(function () {
        Route::get("/", [AutentikasiController::class, "login"]);
        Route::post("/", [AutentikasiController::class, "post_login"]);
    });
});

Route::group(["middleware" => ["is_autentikasi"]], function() {

    Route::prefix("admin")->group(function() {
        Route::get("/dashboard", [AppController::class, "dashboard_admin"]);

        Route::group(["middleware" => ["can:admin"]], function() {
            Route::resource("jenis_sampah", JenisSampahController::class);

            Route::get("/transaksi", [AppController::class, "transaksi"]);
        });
    });
    Route::get("/logout", [AutentikasiController::class, "logout"]);
});