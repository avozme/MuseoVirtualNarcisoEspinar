<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagenes;
use App\Models\Productos;

class ImagenesController extends Controller
{
    public function index() {
        $imagenesList = Imagenes::all();
        return view('imagenes.all', ['imagenesList'=>$imagenesList]);
    }

    public function show($id) {
        $p = Imagenes::find($id);
        $data['imagenes'] = $p;
        return view('imagenes.show', $data);
    }

    public function create() {
        $data ['productosList'] = Productos::all();
        return view('imagenes.form', $data);
    }

    public function store(Request $r) {
        dd($r);
        $image = $r->file('image');
        $image_name = $image->getClientOriginalName();
        $image->storeAs("public", $image_name);
        $p = new Imagenes();
        $p->image = $image_name;
        $p->producto_id = $r->producto_id;
        $p->save();
        return redirect()->route('imagenes.index');
    }

    public function edit($id) {
        $imagenes = Imagenes::find($id);
        $productos = Productos::all();
        return view('imagenes.form', array('imagene' => $imagenes, 'productosList' => $productos));
    }

    public function update($id, Request $r) {
        $p = Imagenes::find($id);
        $p->image = $r->image;
        $p->producto_id = $r->producto_id;
        $p->save();
        return redirect()->route('imagenes.index');
    }

    public function destroy($id) {
        $p = Imagenes::find($id);
        $p->delete();
        return redirect()->route('imagenes.index');
    }
}
