<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $categoriasList = Categorias::all();
        return view('categorias.all', ['categoriasList'=>$categoriasList]);
    }

    public function show($id) {
        $p = Categorias::find($id);
        $data['categorias'] = $p;
        return view('categorias.show', $data);
    }

    public function create() {
        return view('categorias.form');
    }

    public function store(Request $r) {
        $p = new Categorias();
        $p->name = $r->name;
        $p->save();
        return redirect()->route('categorias.index');
    }

    public function edit($id) {
        $categorias = Categorias::find($id);
        //var_dump(array('categoria' => $categorias));
        return view('categorias.form', array('categoria' => $categorias));
        
    }

    public function update($id, Request $r) {
        $p = Categorias::find($id);
        $p->name = $r->name;
        $p->save();
        return redirect()->route('categorias.index');
    }

    public function destroy($id) {
        $p = Categorias::find($id);
        $p->delete();
        return redirect()->route('categorias.index');
    }

    public function get_items($id_categoria) {
        $lista_items = Categorias::find($id_categoria)->items;
        return response()->json($lista_items);
    }
} 

