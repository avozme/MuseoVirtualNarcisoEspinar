<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;

class ProductosController extends Controller
{   
    public function index() {
        $productosList = Productos::all();
    return view('productos.all', ['productosList'=>$productosList]);
    }

    public function show($id) {
        $p = Productos::find($id);
        return view('productos.show', array('producto' => $p));
    }

    public function create() {
        $data ['categoriasList'] = Categorias::all();
        return view('productos.form', $data);
    }

    //Hemos cambiado cossa aquí
    public function store(Request $r) {
        $p = new Productos($r->all());
        $p->name = $r->name;
        $p->description = $r->description;
        $p->dimensions = $r->dimensions;
        $p->collection = $r->collection;
        $p->technique = $r->technique;
        $p->image = $r->image;
        $p->categoria_id = $r->categoria_id;
        $p->items()->attach($r->items);
        $p->save();
        return redirect()->route('productos.index');
    }

    public function edit($id) {
        $productos = Productos::find($id);
        $categorias = Categorias::all();
        return view('productos.form', array('producto' => $productos, 'categoriasList' => $categorias));
    }

    public function update($id, Request $r) {
        $p = Productos::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->dimensions = $r->dimensions;
        $p->collection = $r->collection;
        $p->technique = $r->technique;
        $p->image = $r->image;
        $p->categoria_id = $r->categoria_id;
        $p->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id) {
        $p = Productos::find($id);
        $p->delete();
        return redirect()->route('productos.index');
    }
}