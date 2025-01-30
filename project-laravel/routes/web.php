<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;

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

// MIDDLEWARE AUTH
Route::middleware(["auth"])->group(function (){

Route::get("/cast/create", [CastController::class, 'create']);
// menyimpan ke database
Route::post("/cast", [CastController::class, 'store']);
// CRUD CAST
// READ
// Tampil Semua Data Cast
Route::get("/cast", [CastController::class, 'index']);
// Tampil Detail Data Cast
Route::get("/cast/{cast_id}", [CastController::class, 'show']);

// Create
// Form Tambah Cast
// UPDATE
// Mengambil Data dan menampilkan data yang akan di edit sesuai ID
Route::get("/cast/{cast_id}/edit", [CastController::class, 'edit']);
// Mengupdate Data
Route::put("/cast/{cast_id}", [CastController::class, 'update']);

// DELETE
Route::delete("/cast/{cast_id}", [CastController::class, 'destroy']);



// FINAL-PROJECT
// CRUD GENRE
// CREATE
Route::get("/genre/create", [GenreController::class, 'create']);
// STORE DATA TO DATABASE
Route::post("/genre", [GenreController::class, 'store']);

// READ
// READ DATA
Route::get("/genre", [GenreController::class, "index"]);
// Tampil Detail Data Genre
Route::get("/genre/{genre_id}", [GenreController::class, 'show']);

// UPDATE
// MENGAMBIL DATA DAN MENAMPILKAN
Route::get("/genre/{genre_id}/edit", [GenreController::class, "edit"]);
// UPDATE DATA GENRE
Route::put("/genre/{genre_id}", [GenreController::class, "update"]);

// DELETE
Route::delete("/genre/{genre_id}", [GenreController::class, "destroy"]);

// PROFILE
Route::resource("profile", ProfileController::class)->only(["index","update","create"]);

// Review_film
Route::post("/review/{film_id}",[ReviewController::class, "create"]);
});

// CRUD
// FILM
Route::resource('film', FilmController::class);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
