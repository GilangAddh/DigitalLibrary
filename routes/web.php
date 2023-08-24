<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Faker\Guesser\Name;

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


Route::get('/', function () {
    return view('login.index');
})->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('login.register');
})->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth']], function () {
    // Buku
    Route::get('/buku', [BukuController::class, 'bukuShow'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'bukuTambah'])->name('buku.create');
    Route::post('/buku/proses-add', [BukuController::class, 'bukuTambahProses'])->name('buku.proses-create');
    Route::get('/buku/edit', [BukuController::class, 'bukuEdit'])->name('buku.edit');
    Route::post('/buku/proses-edit', [BukuController::class, 'bukuEditProses'])->name('buku.proses-edit');
    Route::get('/buku/proses-delete', [BukuController::class, 'bukuProsesDelete'])->name('buku.proses-delete');

    //kategori
    Route::get('/kategori', [KategoriController::class, 'kategoriShow'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'kategoriTambah'])->name('kategori.create');
    Route::post('/kategori/proses-add', [KategoriController::class, 'kategoriTambahProses'])->name('kategori.proses-create');
    Route::get('/kategori/edit', [KategoriController::class, 'kategoriEdit'])->name('kategori.edit');
    Route::post('/kategori/proses-edit', [KategoriController::class, 'kategoriEditProses'])->name('kategori.proses-edit');
    Route::get('/kategori/proses-delete', [KategoriController::class, 'kategoriProsesDelete'])->name('kategori.proses-delete');
});
