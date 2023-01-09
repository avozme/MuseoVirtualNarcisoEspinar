<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\ItemsProductos;
use Illuminate\Support\Facades\Storage;

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
        $data ['categorias'] = Categorias::all();
        return view('productos.form', $data);
    }

    //Hemos cambiado cosa aquí
    public function store(Request $r) {
        $image = $r->file('image');
        $image_name = $image->getClientOriginalName();
        $p = new Productos($r->all());
        $p->image = $image_name;
        $p->save();
        $image->storeAs("public/$p->id", $image_name);
        $p->etiquetas()->attach($r->etiquetas);
        //$p->items()->attach($r->items);
        foreach($r->items as $item){ 
            $itemProducto = new ItemsProductos();
            $itemProducto->productos_id = $p->id;
            $itemProducto->value = $item['value'];
            $itemProducto->items_id = $item['id'];
            $itemProducto->save();
        }
        return redirect()->route('productos.index');
    }

    public function edit($id) {
        $producto = Productos::find($id);
        $categorias = Categorias::all();
        $itemsProductos = ItemsProductos::where('productos_id', $id)->get();
        $image = Storage::url("$producto->id/$producto->image");
        return view('productos.form', compact('producto', 'categorias', 'itemsProductos', 'image'));
    }

    public function update(Request $r, $id) {
        $p = Productos::find($id);
        $p->name = $r->name;
        $p->dimensions = $r->dimensions;
        $p->categoria_id = $r->categoria_id;

        if(!blank($r->file('image'))){
            $deleteImage = $p->image;
            Storage::delete('public/'.$deleteImage);
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs("public", $image_name);
            $p->image = $image_name;
        }


        // $p->fill($r->all());
        // $p->save();
        // $p->items()->sync($r->items);

        foreach($r->items as $item){ 
            $itemProducto = ItemsProductos::where('items_id', $item['id'])->first();
            $itemProducto->productos_id = $id;
            $itemProducto->value = $item['value'];
            $itemProducto->save();
        }
        $p->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id) {

        // $p = Productos::find($id);
        // $p->items()->detach();
        // $p->delete();

        $p = Productos::find($id);
        $deleteImage = $p->image;
        Storage::delete('public/' . $deleteImage);
        $p->delete();
        $itemsProductos = ItemsProductos::where('productos_id', $id)->get();
        foreach($itemsProductos as $ip){
            $ip->delete();
        }
        return redirect()->route('productos.index');
    }
}