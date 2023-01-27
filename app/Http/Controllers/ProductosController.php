<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\ItemsProductos;
use App\Models\Imagenes;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{   
    public function index() {
        $productosList = Productos::with('categoria')->get();
        $categorias = Categorias::all();
    return view('productos.all', ['productosList'=>$productosList, 'categorias'=>$categorias]);
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
        $images = $r->file('images');
        $image_name = $image->getClientOriginalName();
        $p = new Productos($r->all());
        $p->image = $image_name;
        $p->save();
        $image->storeAs("public/$p->id", $image_name);
       
        if(!blank($images)){
            foreach($images as $i){
                $i_name = $i->getClientOriginalName();
                $img = new Imagenes();
                $i->storeAs("public/$p->id", $i_name);
                $img->producto_id = $p->id;
                $img->image = $i_name;
                $img->save();
            }
        }
        //$p->etiquetas()->attach($r->etiquetas);
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
        $p->categoria_id = $r->categoria_id;
        if(!blank($r->file('image'))){
            $deleteImage = $p->image;
            Storage::delete("public/" . $id . "/" . $deleteImage);
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs("public/$p->id", $image_name);
            $p->image = $image_name;
        }
        $deleteImages = $r->deleteImages ?? [];
        foreach($deleteImages as $di){
            $img = Imagenes::where('image', $di)->where('producto_id', $p->id)->first();
            Storage::delete("public/" . $img->producto_id . "/" . $di);
            $img->delete();
        }
        $images = $r->file('images');
        if(!blank($images)){
            foreach($images as $i){
                $i_name = $i->getClientOriginalName();
                $i->storeAs("public/$p->id", $i_name);

                $img = new Imagenes();
                $img->producto_id = $p->id;
                $img->image = $i_name;
                $img->save();
            }
        }

        $itemsProductos = ItemsProductos::where('productos_id', $id)->get();
        foreach($itemsProductos as $ip){
            $ip->delete();
        }
        foreach($r->items as $item){ 
            // $itemProducto = ItemsProductos::where('items_id', $item['id'])->first();
            $itemProducto = new ItemsProductos();
            $itemProducto->productos_id = $id;
            $itemProducto->items_id = $item['id'];
            $itemProducto->value = $item['value'];
            $itemProducto->save();
        }
        $p->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id) {
        $p = Productos::find($id);
        $deleteImage = $p->image;
        //Storage::delete('public/' . $id);
         Storage::DeleteDirectory('public/' . $id);
        $p->delete();
        $itemsProductos = ItemsProductos::where('productos_id', $id)->get();
        foreach($itemsProductos as $ip){
            $ip->delete();
        }
        $borrarImagenes = Imagenes::where('producto_id', $id)->get();
        foreach($borrarImagenes as $bi){
            $bi->delete();
        }
        return redirect()->route('productos.index');
    }

    public function buscadorProductos(Request $r) {
        $categorias = Categorias::all();
        $productosList = Productos::busquedaProductos($r->idCategoria, $r->textoBusqueda);
        return view('productos.all', ['textoBusqueda'=> $r->textoBusqueda, 'productosList'=>$productosList, 'categorias'=>$categorias]);
    }
}