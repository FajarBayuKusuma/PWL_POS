<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
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

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/tambah', [UserController::class], 'tambah')->name('/user/tambah');
Route::get('/user/tambah_simpan', [UserController::class], 'tambah_simpan')->name('/user/tambah_simpan');
Route::get('/user/edit/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
Route::get('/user/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');


Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);          //menampilkan halaman awal level user
    Route::post('/list', [LevelController::class,'list']);       //menampilkan data level user dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class,'create']);    //menampilkan halaman form tambah level user
    Route::post('/', [LevelController::class,'store']);          //menyimpan data level user baru  
    Route::get('/{id}', [LevelController::class,'show']);        //menampilkan detail level user
    Route::get('/edit/{id}', [LevelController::class,'edit']);   //menampilkan halaman form edit level user
    Route::put('/{id}', [LevelController::class,'update']);      //menyimpan perubahan data level user
    Route::delete('/{id}', [LevelController::class,'destroy']);  //menghapus data level user
});
//Praktikum 9
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('proses_login',[AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');
Route::post('proses_register',[AuthController::class, 'proses_register'])->name('proses_register');

//kita atur juga untuk middlewware menggunakan group routing
//didalamnya juga terdapat untuk mengeek kondisi login
//jika user yang login meerupakan admin maka akan diarahkan e adminontroller
//jika user login merupakan manager maka akan diarahkan ke userontroller

Route::group(['middleware'=>['auth']],function(){
    
    Route::group(['middleware'=>['cek_login:1']], function(){
        route::resource('admin', AdminController::class);
    });
    Route::group(['middleware'=>['cek_login:2']], function(){
        route::resource('manager', ManagerController::class);
    });
});