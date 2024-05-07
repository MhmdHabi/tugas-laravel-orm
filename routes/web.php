<?php

use App\Http\Controllers\ProductController;
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


Route::get('/tambah-product', [ProductController::class, 'getForm'])->name('get_form');
Route::post('/tambah-product', [ProductController::class, 'create'])->name('form_create');
Route::get('/products', [ProductController::class, 'listCatalog'])->name('list_catalog');
Route::get('/admin/list-products', [ProductController::class, 'listProduct'])->name('list_product');
Route::get('/product/{id}/update', [ProductController::class, 'update'])->name('update_product');
Route::put('/product/{id}/update', [ProductController::class, 'updatePost'])->name('update_product_post');
Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('delete_product');

Route::get('/profil', [UserController::class, 'getProfil'])->name('get_profil');
Route::get('/profil/{id}', [UserController::class, 'index'])->name('index');
Route::get('/admin/{user_id}/list-products', [ProductController::class, 'getProduct'])->name('product_get');
