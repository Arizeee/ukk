<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasBukuController;
use App\Http\Controllers\PetugasUlasanController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PetugasKategoriController;
use App\Http\Controllers\PetugasPeminjamanController;
use App\Http\Controllers\PetugasPengembalianController;

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


Route::get('/', [DashboardController::class, 'showUserForm'])->name('peminjam.dashboard');

Route::get('/books/{category}', [DashboardController::class, 'showBooksByCategory'])->name('books.by.category');

Route::get('/search/books', [DashboardController::class, 'searchBooks'])->name('search.books');

Route::get('/show/{id}', [DashboardController::class, 'show'])->name('peminjam.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'UserAccess:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin.dashboard');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/search', [KategoriController::class, 'search'])->name('kategori.search');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::get('/buku/export-pdf', [BukuController::class, 'exportPdf'])->name('buku.exportPdf');
    Route::get('/buku/export-excel', [BukuController::class, 'exportExcel'])->name('buku.exportExcel');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/{id}/remove-sampul', [BukuController::class, 'removeSampul'])->name('buku.remove_sampul');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/export-pdf', [UserController::class, 'exportPdf'])->name('users.exportPdf');
    Route::get('/users/export-excel', [UserController::class, 'exportExcel'])->name('users.exportExcel');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjamanForm'])->name('admin.peminjaman.create');
    Route::post('/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjaman'])->name('admin.peminjaman.store');
    Route::get('/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/peminjaman/export-pdf', [AdminPeminjamanController::class, 'exportPdf'])->name('admin.peminjaman.exportPdf');
    Route::get('/peminjaman/export-excel', [AdminPeminjamanController::class, 'exportExcel'])->name('admin.peminjaman.exportExcel');
    Route::get('/peminjaman/search', [AdminPeminjamanController::class, 'search'])->name('admin.peminjaman.search');
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::get('/ulasan/export-pdf', [UlasanController::class, 'exportPdf'])->name('ulasan.exportPdf');
    Route::get('/ulasan/export-excel', [UlasanController::class, 'exportExcel'])->name('ulasan.exportExcel');
    Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});

Route::middleware(['auth', 'UserAccess:petugas'])->group(function () {
    Route::get('/petugas', [PetugasController::class, 'showPetugasForm'])->name('petugas.dashboard');

    Route::get('/petugas/kategori', [PetugasKategoriController::class, 'index'])->name('petugas.kategori.index');
    Route::get('/petugas/kategori/search', [PetugasKategoriController::class, 'search'])->name('petugas.kategori.search');
    Route::get('/petugas/kategori/create', [PetugasKategoriController::class, 'create'])->name('petugas.kategori.create');
    Route::post('/petugas/kategori', [PetugasKategoriController::class, 'store'])->name('petugas.kategori.store');
    Route::get('/petugas/kategori/{id}', [PetugasKategoriController::class, 'show'])->name('petugas.kategori.show');
    Route::get('/petugas/kategori/{id}/edit', [PetugasKategoriController::class, 'edit'])->name('petugas.kategori.edit');
    Route::put('/petugas/kategori/{id}', [PetugasKategoriController::class, 'update'])->name('petugas.kategori.update');
    Route::delete('/petugas/kategori/{id}', [PetugasKategoriController::class, 'destroy'])->name('petugas.kategori.destroy');

    Route::get('/petugas/buku', [PetugasBukuController::class, 'index'])->name('petugas.buku.index');
    Route::get('/petugas/buku/search', [PetugasBukuController::class, 'search'])->name('petugas.buku.search');
    Route::get('/petugas/buku/export-pdf', [PetugasBukuController::class, 'exportPdf'])->name('petugas.buku.exportPdf');
    Route::get('/petugas/buku/export-excel', [BukuController::class, 'exportExcel'])->name('petugas.buku.exportExcel');
    Route::get('/petugas/buku/create', [PetugasBukuController::class, 'create'])->name('petugas.buku.create');
    Route::post('/petugas/buku', [PetugasBukuController::class, 'store'])->name('petugas.buku.store');
    Route::get('/petugas/buku/{id}/edit', [PetugasBukuController::class, 'edit'])->name('petugas.buku.edit');
    Route::put('/petugas/buku/{id}', [PetugasBukuController::class, 'update'])->name('petugas.buku.update');
    Route::get('/petugas/buku/{id}/remove-sampul', [PetugasBukuController::class, 'removeSampul'])->name('petugas.buku.remove_sampul');
    Route::delete('/petugas/buku/{id}', [PetugasBukuController::class, 'destroy'])->name('petugas.buku.destroy');

    Route::get('/petugas/peminjaman/create', [PetugasPeminjamanController::class, 'createPeminjamanForm'])->name('petugas.peminjaman.create');
    Route::post('/petugas/peminjaman/create', [PetugasPeminjamanController::class, 'createPeminjaman'])->name('petugas.peminjaman.store');
    Route::get('/petugas/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('petugas.peminjaman.index');
    Route::get('/petugas/peminjaman/export-pdf', [PetugasPeminjamanController::class, 'exportPdf'])->name('petugas.peminjaman.exportPdf');
    Route::get('/petugas/peminjaman/export-excel', [PetugasPeminjamanController::class, 'exportExcel'])->name('petugas.peminjaman.exportExcel');
    Route::get('/petugas/peminjaman/search', [PetugasPeminjamanController::class, 'search'])->name('petugas.peminjaman.search');
    Route::post('/petugas/peminjaman/{id}', [PetugasPeminjamanController::class, 'approve'])->name('petugas.approve');
    Route::post('/petugas/pengembalian/{id}', [PetugasPeminjamanController::class, 'approve_kembali'])->name('petugas.approve.pengembalian');
    Route::get('/petugas/ulasan', [PetugasUlasanController::class, 'index'])->name('petugas.ulasan.index');
    Route::get('/petugas/ulasan/export-pdf', [PetugasUlasanController::class, 'exportPdf'])->name('petugas.ulasan.exportPdf');
    Route::get('/petugas/ulasan/export-excel', [PetugasUlasanController::class, 'exportExcel'])->name('petugas.ulasan.exportExcel');
    Route::delete('/petugas/ulasan/{id}', [PetugasUlasanController::class, 'destroy'])->name('petugas.ulasan.destroy');

    Route::get('/petugas/pengembalian', [PetugasPengembalianController::class, 'index'])->name('petugas.pengembalian.index');
});

Route::middleware(['auth', 'UserAccess:peminjam'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.index');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/pinjam/{id}', [PeminjamanController::class, 'pinjamBuku'])->name('peminjam.buku');
    Route::post('/pengembalian/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('pengembalian.buku');
    Route::post('/pengajuan/pengembalian/{id}', [PetugasPengembalianController::class, 'ajukanpengembalian'])->name('ajukan.pengembalian.buku');
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('/favorite/add/{id}', [FavoriteController::class, 'store'])->name('favorite.store');
    Route::delete('/favorite/delete/{id}', [FavoriteController::class, 'destroy'])->name('favorite.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/add/comment/{id}', [DashboardController::class, 'addComment'])->name('add.comment');
    Route::get('/comment/{id}/edit', [DashboardController::class, 'editComment'])->name('comment.edit');
    Route::put('/comment/{id}/update', [DashboardController::class, 'updateComment'])->name('comment.update');
    Route::delete('/comment/{id}/delete', [DashboardController::class, 'deleteComment'])->name('comment.delete');
});

