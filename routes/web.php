<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/level', [LevelController::class, 'index']);
// // Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

//Praktikum 5
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);

Route::post('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::put('/kategori/edit_save/{id}', [KategoriController::class, 'edit_save']);


Route::post('/kategori/delete/{id}', [KategoriController::class, 'delete']);

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/level/tambah', [LevelController::class, 'tambah']);
// Route::post('/level/tambah_simpan', [LevelController::class, 'tambah_simpan']);
// Route::get('/level/tambah', [LevelController::class, 'tambah'])->name('level.tambah');
// Route::get('/kategori', [KategoriController::class, 'index']);

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']);          //menampilkan halaman awal user
    Route::post('/list', [UserController::class,'list']);       //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class,'create']);    //menampilkan halaman form tambah user
    Route::post('/', [UserController::class,'store']);          //menyimpan data user baru  
    Route::get('/{id}', [UserController::class,'show']);        //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class,'edit']);   //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class,'update']);      //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class,'destroy']);  //menghapus data user
});


Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);          //menampilkan halaman awal level user
    Route::post('/list', [LevelController::class,'list']);       //menampilkan data level user dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class,'create']);    //menampilkan halaman form tambah level user
    Route::post('/', [LevelController::class,'store']);          //menyimpan data level user baru  
    Route::get('/{id}', [LevelController::class,'show']);        //menampilkan detail level user
    Route::get('/{id}/edit', [LevelController::class,'edit']);   //menampilkan halaman form edit level user
    Route::put('/{id}', [LevelController::class,'update']);      //menyimpan perubahan data level user
    Route::delete('/{id}', [LevelController::class,'destroy']);  //menghapus data level user
});

