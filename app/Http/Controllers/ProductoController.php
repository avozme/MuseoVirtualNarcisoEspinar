<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        $productoList = Producto::all();
        return view('producto.all', ['productoList'=>$productoList]);
    }

    public function show($id) {
        $p = Producto::find($id);
        $data['producto'] = $p;
        return view('producto.show', $data);
    }

    public function create() {
        return view('producto.form');
    }

    public function store(Request $r) {
        $p = new Producto();
        $p->nombre = $r->nombre;
        $p->descripcion = $r->descripcion;
        $p->dimensiones = $r->dimensiones;
        $p->coleccion = $r->coleccion;
        $p->tecnica = $r->tecnica;
        $p->save();
        return redirect()->route('producto.index');
    }

    public function edit($id) {
        $producto = Producto::find($id);
        return view('producto.form', array('producto' => $producto));
    }

    public function update($id, Request $r) {
        $p = Producto::find($id);
        $p->nombre = $r->nombre;
        $p->descripcion = $r->descripcion;
        $p->dimensiones = $r->dimensiones;
        $p->coleccion = $r->coleccion;
        $p->tecnica = $r->tecnica;
        $p->save();
        return redirect()->route('producto.index');
    }

    public function destroy($id) {
        $p = Producto::find($id);
        $p->delete();
        return redirect()->route('producto.index');
    }
}