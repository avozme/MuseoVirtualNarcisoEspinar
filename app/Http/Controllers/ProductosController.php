<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
//use App\Models\Categorias; 

class ProductosController extends Controller
{
    public function index() {
        $productosList = Productos::all();
       // $categoriasList = Categorias::all();
    return view('productos.all', ['productosList'=>$productosList /*, 'categoriasList'=>$categoriasList*/]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        /*$categorias = Categorias::find(1)->categorias;
        foreach ($categorias as $categoria) {
            $categoria->name;
        }
        $data2['categorias'] = $c;*/
    return view('productos.show', $data/*, $data2*/);
    }

    public function create() {
        return view('productos.form');
    }

    public function store(Request $r) {
        $p = new Productos();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->dimensions = $r->dimensions;
        $p->collection = $r->collection;
        $p->technique = $r->technique;
        $p->save();
        return redirect()->route('productos.index');
    }

    public function edit($id) {
        $productos = Productos::find($id);
        return view('productos.form', array('producto' => $productos));
    }

    public function update($id, Request $r) {
        $p = Productos::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->dimensions = $r->dimensions;
        $p->collection = $r->collection;
        $p->technique = $r->technique;
        $p->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id) {
        $p = Productos::find($id);
        $p->delete();
        return redirect()->route('productos.index');
    }
}