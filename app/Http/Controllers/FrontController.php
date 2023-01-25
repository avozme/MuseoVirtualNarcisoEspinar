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
        return view('front.piezas_categorias', ['todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList, 'idCategoria'=>$id]);
    }

    public function buscadorCategorias(Request $r) {
        $categoriasList = Productos::recuperarListaCategorias();
        $todosProductos = Productos::busquedaCategorias($r->idCategoria, $r->textoBusqueda);
        return view('front.piezas_categorias', ['textoBusqueda'=> $r->textoBusqueda, 'todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList, 'idCategoria' => $r->idCategoria]);
    }
}