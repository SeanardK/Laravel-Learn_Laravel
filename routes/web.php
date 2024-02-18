<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
})->name("home");

// Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get("/auth/login", [AuthController::class, "login"]);
Route::get("/auth/register", [AuthController::class, "register"]);

Route::post("actionLogin", [AuthController::class, "actionLogin"])->name("actionLogin");

Route::resource("/posts", PostController::class);
