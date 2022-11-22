<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opciones;

class OpcionesController extends Controller
{
    
    public function index() {
        $opcionesList = Opciones::all();
        return view('opciones.all', ['opcionesList'=>$opcionesList]);
    }

    public function show($id) {
        $p = Opciones::find($id);
        $data['opciones'] = $p;
        return view('opciones.show', $data);
    }

    public function create() {
        return view('opciones.form');
    }

    public function store(Request $r) {
        $p = new Opciones();
        $p->valor = $r->valor;
        $p->clave = $r->clave;
        $p->save();
        return redirect()->route('opciones.index');
    }

    public function edit($id) {
        $opciones = Opciones::find($id);
        return view('opciones.form', array('opcion' => $opciones));
    }

    public function update($id, Request $r) {
        $p = Opciones::find($id);
        $p->valor = $r->valor;
        $p->clave = $r->clave;
        $p->save();
        return redirect()->route('opciones.index');
    }

    public function destroy($id) {
        $p = Opciones::find($id);
        $p->delete();
        return redirect()->route('opciones.index');
    }
}