<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Models\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CourseController::class, "index"]);

Route::post('/enroll', [ApplicationController::class, "new_application"]);

Route::get("/admin", [AdminController::class, "index"]);

Route::get("/application/{id_application}/confirm", [ApplicationController::class, "confirm"]);

Route::post("/course/create", [CourseController::class, "create"]);

Route::post("/category/create", [CategoryController::class, "create_category"]);

Route::get("/login", [UserController::class, 'login']);

Route::get('/reg', [UserController::class, 'register']);

Route::get('/acc', [UserController::class, 'account']);

Route::post("/login-valid", [UserController::class, 'login_valid']);

Route::post("/register-valid", [UserController::class, 'register_valid']);

Route::get("/logout", [UserController::class, 'signout']);

Route::get("/categories/{id}", [CategoryController::class, 'show']);
