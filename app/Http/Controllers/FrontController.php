<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $productosList = Productos::all(); //funcion
        
        return view('front.front', ['productosList'=>$productosList]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        return view('categorias.show', $data);
    }
}
 //categoria

 //foreach para recorrer los elementos que quiero mostrar