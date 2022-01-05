<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoriaController;


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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');;

Route::resource('users',App\Http\Controllers\UserController::class)->middleware('auth.admin');

Route::get('/admin/create', [App\Http\Controllers\UserController::class, 'create'])->middleware('auth.admin')->name('admin.create');
Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::get('categoria', 'App\Http\Controllers\CategoriaController@index')->name('categorias.index');
Route::resource('categoria',App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('producto', 'App\Http\Controllers\ProductoController@index')->name('productos.index');
Route::resource('producto',App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::get('denominacion', 'App\Http\Controllers\DenominacionController@index')->name('denominacions.index');
Route::resource('denominacion',App\Http\Controllers\DenominacionController::class)->middleware('auth');


Route::get('pos', 'App\Http\Controllers\PosController@index')->name('pos.index');
