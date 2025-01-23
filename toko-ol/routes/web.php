<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Models\category;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
    Route::get('/produk', [HomeController::class, 'showProdukPage'])->name('produk');
    Route::get('/detail', [HomeController::class, 'showDetailPage'])->name('detail');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// login
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Admin
Route::get('/dashboard', [DashboardController::class, 'showDashboardPage'])->name('dashboard');
Route::get('/category', [CategoryController::class, 'index'])->name('category');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [DashboardController::class, 'products'])->name('produk');
Route::get('/produk/add', [DashboardController::class, 'formProduk'])->name('produk.add');
Route::get('/produk/editProduk/{id}', [DashboardController::class, 'editProduk'])->name('produk.editProduk');
Route::put('/produk/editProduk/{id}', [DashboardController::class, 'updateProduk'])->name('produk.updateProduk');
Route::post('/produk/add', [DashboardController::class, 'addProduk'])->name('produk.add');
Route::delete('/produk/{id}', [DashboardController::class, 'destroy'])->name('produk.destroy');
Route::get('/produk/{id}', [DashboardController::class, 'show'])->name('produk.show');

// Category
Route::get('/category/add', [CategoryController::class, 'formCategory'])->name('categories.add');
Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
Route::post('/category/add', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


Route::resource('products', ProductController::class);
