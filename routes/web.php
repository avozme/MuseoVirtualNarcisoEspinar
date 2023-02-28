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
Route::resource('usuarios', 'UsersController');

// Rutas para los buscadores
Route::get('buscadorBack', 'ProductosController@buscadorProductos')->name('buscadorBack');
Route::get('/categoria/{id}', 'FrontController@mostrarCategorias')->name('productoPorCategoria');
Route::get('buscadorFront', 'FrontController@buscadorGeneral')->name('buscadorFront');
Route::get('buscador', 'FrontController@vistaBuscador')->name('vistaBuscador');
Route::post('buscadorPorcampos', 'FrontController@buscadorPorCampos')->name('buscadorPorCampos');

// Rutas para las páginas de información legal
Route::get('acerca_de', 'FrontController@acercaDe')->name('acerca_de');
Route::get('politica_privacidad', 'FrontController@politicaPrivacidad')->name('politica_privacidad');
Route::get('terminos_uso', 'FrontController@terminosUso')->name('terminos_uso');
Route::get('politica_cookies', 'FrontController@politicaCookies')->name('politica_cookies');

Route::get('/dashboard', function () {
    return view('productos.all');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
