<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Categorias;

class ItemsController extends Controller
{
    public function index() {
        $itemsList = Items::all();
        return view('items.all', ['itemsList'=>$itemsList]);
    }

    public function show($id) {
        $p = Items::find($id);
        $data['items'] = $p;
        return view('items.show', $data);
    }

    public function create() {
        return view('items.form');
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
        $categorias = Categorias::all();
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