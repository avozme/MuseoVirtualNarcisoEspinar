<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        //$productosList = Productos::all(); //funcion
        $productosList = Productos::recuperarProductosFront();
        $categoriasList = Productos::recuperarListaCategorias();
        return view('front.front', ['productosList'=>$productosList, 'categoriasList'=>$categoriasList]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        return view('categorias.show', $data);
    }

    public function mostrarCategorias($id) {
        $categoriasList = Productos::recuperarListaCategorias();
        $todosProductos = Productos::recuperarPorCategoria($id);
        return view('front.piezas_categorias', ['todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList]);
    }

    public function buscadorPostales() {
        //$productosList = Productos::all(); //funcion
        $resultadoBusqueda = Productos::busquedaPostales();
        return view('front.postales', ['resultadoBusqueda'=>$resultadoBusqueda]);
    }
}
 //categoria

 //foreach para recorrer los elementos que quiero mostrar