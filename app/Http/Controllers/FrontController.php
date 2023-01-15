<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        //$productosList = Productos::all(); //funcion
        $productosList = Productos::recuperarProductosFront();
        return view('front.front', ['productosList'=>$productosList]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        return view('categorias.show', $data);
    }

    public function mostrarPostales() {
        //$productosList = Productos::all(); //funcion
        $todosProductos = Productos::recuperarPostales();
        return view('front.postales', ['todosProductos'=>$todosProductos]);
    }

    public function mostrarpiezasPiezasArqueologicas() {
        //$productosList = Productos::all(); //funcion
        $todosProductos = Productos::recuperarPiezasArqueologicas();
        return view('front.piezas_arqueologicas', ['todosProductos'=>$todosProductos]);
    }
}
 //categoria

 //foreach para recorrer los elementos que quiero mostrar