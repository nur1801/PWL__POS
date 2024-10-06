<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;

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

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);

Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/', [WelcomeController::class, 'index']);

// [JS 05]
Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']); // menampilkan halaman untuk user
    Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
    // [JS06] Pratikum 1 - Modal Ajax Tambah Data (Data User)
    Route::get('/create_ajax',[UserController::class, 'create_ajax']);//menampilkan halaman form tambah user ajax
    Route::post('/ajax',[UserController::class, 'store_ajax']);//meyimpan data user baru ajax
    Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
    // Modal Ajax Detail Data (Data User)
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); // menampilkan detail user ajax
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
    // [JS06] Pratikum 2 - Modal Ajax Edit Data (Data User)
    Route::get('/{id}/edit_ajax',[UserController::class,'edit_ajax']); //menampilkan halaman form edit user ajax
    Route::put('/{id}/update_ajax',[UserController::class,'update_ajax']);//meyimpan perubahan data user ajax
    // [JS06] Pratikum 2 - Modal Ajax Hapus Data (Data User)
    Route::get('/{id}/delete_ajax',[UserController::class,'confirm_ajax']);//untuk menampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax',[UserController::class,'delete_ajax']);//untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

// [JS05] TUGAS PRATIKUM
// m_level
Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);      // menampilkan data level dalam bentuk json untuk datables
    Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);         // menyimpan data level baru
    // [JS06] Tugas Pratikum - Modal Ajax Tambah Data (Data Level)
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [LevelController::class, 'store_ajax']);     // Menyimpan data user baru Ajax
    Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan data detail level
    // [JS06] Tugas Pratikum - Modal Ajax Detail Data (Data Level)
    Route::get('/{id}/show_ajax', [LevelController :: class, 'show_ajax']); // menampilkan detail level ajax
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
    // [JS06] Tugas Pratikum - Modal Ajax Edit Data (Data Level)
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit level Ajax
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data level Ajax
    // [JS06] Tugas Pratikum - Modal Ajax Hapus Data (Data Level)
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk menampilkan form konfirmasi delete user Ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk menghapus data user Ajax
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});

// m_kategori
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    // [JS06] Tugas Pratikum - Modal Ajax Tambah Data (Data Kategori)
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); 
    Route::post('/ajax', [KategoriController::class, 'store_ajax']); 
    Route::get('/{id}', [KategoriController::class, 'show']);
    // [JS06] Tugas Pratikum - Modal Ajax Detail Data (Data Kategori)
    Route::get('/{id}/show_ajax', [KategoriController :: class, 'show_ajax']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    // [JS06] Tugas Pratikum - Modal Ajax Edit Data (Data Kategori)
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); 
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); 
    // [JS06] Tugas Pratikum - Modal Ajax Hapus Data (Data Kategori)
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); 
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); 
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// m_supplier
Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);              // menampilkan halaman awal supplier
    Route::post('/list', [SupplierController::class, 'list']);          // menampilkan data supplier dalam bentuk json untuk datatables
    Route::get('/create', [SupplierController::class, 'create']);       // menampilkan halaman form tambah supplier
    Route::post('/', [SupplierController::class, 'store']);              // menyimpan data supplier baru
    Route::get('/{id}', [SupplierController::class, 'show']);            // menampilkan detail supplier
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);       // menampilkan halaman form edit supplier
    Route::put('/{id}', [SupplierController::class, 'update']);          // menyimpan perubahan data supplier
    Route::delete('/{id}', [SupplierController::class, 'destroy']);      // menghapus data supplier
});

// m_barang
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);              // menampilkan halaman awal barang
    Route::post('/list', [BarangController::class, 'list']);          // menampilkan data barang dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']);       // menampilkan halaman form tambah barang
    Route::post('/', [BarangController::class, 'store']);              // menyimpan data barang baru
    Route::get('/{id}', [BarangController::class, 'show']);            // menampilkan detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']);       // menampilkan halaman form edit barang
    Route::put('/{id}', [BarangController::class, 'update']);          // menyimpan perubahan data barang
    Route::delete('/{id}', [BarangController::class, 'destroy']);      // menghapus data barang
});