<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Categorias;

class ItemsController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $itemsList = Items::orderBy('name')->get();
        $categorias = Categorias::orderBy('name')->get();
        return view('items.all', ['itemsList'=>$itemsList, 'categorias'=>$categorias]);
    }

    public function indexPorCategoria($idCategoria) {
        // Obtener solo los items de la categoria $idCategoria
        if ($idCategoria == -1) {
            $itemsList = Items::orderBy('name')->get();
        } else {
            $itemsList = Items::where('categoria_id', $idCategoria)->orderBy('name')->get();
        }
        $categorias = Categorias::orderBy('name')->get();
        return view('items.all', ['itemsList'=>$itemsList, 'categorias'=>$categorias, 'idCategoria'=>$idCategoria]);
    }

    public function show($id) {
        $p = Items::find($id);
        $data['items'] = $p;
        return view('items.show', $data);
    }

    public function create() {
        $categorias = Categorias::orderBy('name')->get();
        return view('items.form', $data);
    }

    public function store(Request $r) {
        $p = new Items();
        $p->name = $r->name;
        $p->categoria_id = $r->categoria_id;
        $p->save();
        return redirect()->route('items.index');
    }

    public function edit($id) {
        $items = Items::find($id);
        $categorias = Categorias::orderBy('name')->get();
        return view('items.form', array('item' => $items, 'categoriasList' => $categorias));
    }

    public function update($id, Request $r) {
        $p = Items::find($id);
        $p->name = $r->name;
        $p->categoria_id = $r->categoria_id;
        $p->save();
        return redirect()->route('items.index');
    }

    public function destroy($id) {
        $p = Items::find($id);
        $p->delete();
        return redirect()->route('items.index');
    }
}