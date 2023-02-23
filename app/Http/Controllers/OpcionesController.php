<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Opciones;

class OpcionesController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }
    
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
        $p->value = $r->value;
        $p->key = $r->key;
        $p->type = $r->type;
        $p->save();
        return redirect()->route('opciones.index');
    }

    public function edit($id) {
        $opciones = Opciones::find($id);
        return view('opciones.form', array('opcion' => $opciones));
    }

    public function update($id, Request $r) {
        $opcion = Opciones::find($id);
        if($opcion->type == 'foto' && !blank($r->file('image'))){
            Storage::delete("public/" . $opcion->key . "/" . $opcion->value );
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs("public/$opcion->key", $image_name);
            $opcion->value = $image_name;
        }
        elseif($opcion->type == 'color'){
            $opcion->value = $r->value;
        }

        else $opcion->value = $r->value;
        $opcion->save();
        return redirect()->route('opciones.index');
    }

    public function destroy($id) {
        $p = Opciones::find($id);
        $p->delete();
        return redirect()->route('opciones.index');
    }
}