<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Opciones;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $productosList = Productos::recuperarProductosFront();
        $categoriasList = Categorias::all();
        $fotoPrincipal = Opciones::where('key', 'fotoPrincipal')->first();
        $logotipo = Opciones::where('key', 'logo')->first();
        return view('front.front', ['productosList'=>$productosList, 'categoriasList'=>$categoriasList,'fotoPrincipal' => $fotoPrincipal,'logotipo' => $logotipo]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        $categoria = Categorias::find($r->idCategoria);
        return view('categorias.show', $data);
    }

    public function mostrarCategorias($id, Request $r) {
        $categoria = Categorias::find($id);
        $categoriasList = Categorias::all();
        $todosProductos = blank($r->textoBusqueda) ? Productos::recuperarPorCategoria($id) : Productos::busquedaCategorias($id, $r->textoBusqueda);
        return view('front.piezas_categorias', ['todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList,'categoria' => $categoria, 'textoBusqueda' => $r->textoBusqueda]);
    }

    public function buscadorCategorias(Request $r) {
        $categoria = Categorias::find($r->idCategoria);
        $categoriasList = Categorias::all();
        $todosProductos = Productos::busquedaCategorias($r->idCategoria, $r->textoBusqueda);
        return view('front.piezas_categorias', ['textoBusqueda'=> $r->textoBusqueda, 'todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList, 'idCategoria' => $r->idCategoria, 'categoria' => $categoria]);
    }
}