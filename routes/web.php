<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\PosController;

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
Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->middleware('auth.admin')->name('users.store');

Route::get('categoria', 'App\Http\Controllers\CategoriaController@index')->middleware('auth')->name('categorias.index');
Route::resource('categoria',App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('producto', 'App\Http\Controllers\ProductoController@index')->middleware('auth')->name('productos.index');
Route::resource('producto',App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::get('denominacion', 'App\Http\Controllers\DenominacionController@index')->middleware('auth')->name('denominacions.index');
Route::resource('denominacion',App\Http\Controllers\DenominacionController::class)->middleware('auth');




Route::get('pos', 'App\Http\Controllers\PosController@index')->name('pos.index')->middleware('auth');
Route::resource('pos',App\Http\Controllers\PosController::class)->middleware('auth');

Route::get('clientes', 'App\Http\Controllers\ClienteController@index')->middleware('auth')->name('clientes.index');
Route::resource('clientes',App\Http\Controllers\ClienteController::class)->middleware('auth');




Route::post("/productoDeVenta", "App\Http\Controllers\PosController@agregarProductoVenta")->name("agregarProductoVenta")->middleware('auth');
Route::delete("/productoDeVenta", "App\Http\Controllers\PosController@quitarProductoDeVenta")->name("quitarProductoDeVenta")->middleware('auth');
Route::post("/terminarOCancelarVenta", "App\Http\Controllers\PosController@terminarOCancelarVenta")->name("terminarOCancelarVenta")->middleware('auth');

Route::resource('ventas', 'App\Http\Controllers\VentasController')->middleware('auth');
Route::get("/ventas/ticket", "App\Http\Controllers\VentasController@ticket")->name("ventas.ticket");



Route::get('roles', 'App\Http\Controllers\RolesController@index')->name('roles.index')->middleware('auth');
Route::resource('roles', 'App\Http\Controllers\RolesController')->middleware('auth');

Route::get('permisos', 'App\Http\Controllers\PermisosController@index')->name('permisos.index')->middleware('auth');
Route::resource('permisos', 'App\Http\Controllers\PermisosController')->middleware('auth');