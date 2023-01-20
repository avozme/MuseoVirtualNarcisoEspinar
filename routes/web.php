<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
Route::get('/', 'FrontController@index');

Route::get('/categorias/get_items/{id_categoria}', 'CategoriasController@get_items');

Route::resource('productos', 'ProductosController');
Route::resource('categorias', 'CategoriasController');
Route::resource('etiquetas', 'EtiquetasController');
Route::resource('items', 'ItemsController');
Route::resource('opciones', 'OpcionesController');
Route::resource('imagenes', 'ImagenesController');
Route::resource('usuarios', 'UsuariosController');


Route::get('/categoria/{id}', 'FrontController@mostrarCategorias')->name('productoPorCategoria');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
