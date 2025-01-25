<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/send', [AuthController::class, 'send']);

Route::get('/table',[DashboardController::class, 'table']);
Route::get('/data-table',[DashboardController::class, 'dataTable']);

// CRUD CAST

// Create
// Form Tambah Cast
Route::get("/cast/create", [CastController::class, 'create']);
// menyimpan ke database
Route::post("/cast", [CastController::class, 'store']);

// READ
// Tampil Semua Data Cast
Route::get("/cast", [CastController::class, 'index']);
// Tampil Detail Data Cast
Route::get("/cast/{cast_id}", [CastController::class, 'show']);

// UPDATE
// Mengambil Data dan menampilkan data yang akan di edit sesuai ID
Route::get("/cast/{cast_id}/edit", [CastController::class, 'edit']);
// Mengupdate Data
Route::put("/cast/{cast_id}", [CastController::class, 'update']);

// DELETE
Route::delete("/cast/{cast_id}", [CastController::class, 'destroy']);