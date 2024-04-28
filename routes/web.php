<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

Route::get('/datakategori', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
Route::get('/datamerek', [BrandController::class, 'index'])->name('brands.datamerek');
Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');


Route::post('/daftar', [AuthController::class, 'register']);

Route::post('/masuk', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
Route::get('/gambar/{nama_file}', 'App\Http\Controllers\GambarController@show')->name('gambar.show');
Route::resource('produk', 'ProdukController');


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});



Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/masuk', function () {
    return view('masuk');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/keranjang', function () {
    return view('keranjang', [
        "title" => "Keranjang",
        "name" => "Ridhan Zakie",
        "email" => "ridhanzakie10@gmail.com",
        "image" => "2.jpg"
    ]);
});



Route::get('/produk', function () {
    return view('produk', [
        "title" => "Produk",
        "posts" => Post::all()
    ]);
});



Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/datauser', function () {
    return view('datauser');
});

Route::get('/datapesanan', function () {
    return view('datapesanan');
});

Route::get('/datatransaksi', function () {
    return view('datatransaksi');
});

Route::get('/dataproduk', function () {
    return view('dataproduk');
});

// Route::get('/datakategori', function () {
    // return view('datakategori');
// });

// Route::get('/datamerek', function () {
    // return view('datamerek');
// });

Route::get('/addproduk', function () {
    return view('addproduk');
});