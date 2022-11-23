<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagenes;

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
        return view('imagenes.form');
    }

    public function store(Request $r) {
        $p = new Imagenes();
        $p->image = $r->image;
        $p->save();
        return redirect()->route('imagenes.index');
    }

    public function edit($id) {
        $imagenes = Imagenes::find($id);
        return view('imagenes.form', array('imagene' => $imagenes));
    }

    public function update($id, Request $r) {
        $p = Imagenes::find($id);
        $p->image = $r->image;
        $p->save();
        return redirect()->route('imagenes.index');
    }

    public function destroy($id) {
        $p = Imagenes::find($id);
        $p->delete();
        return redirect()->route('imagenes.index');
    }
}
