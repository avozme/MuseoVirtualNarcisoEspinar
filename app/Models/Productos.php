<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Productos extends Model
{

    protected $fillable = ["name", "remarks", "dimensions", "image", "categoria_id"];


    public function categoria() {
        return $this->belongsTo('App\Models\Categorias');
        }

    public function etiquetas() {
        return $this->belongsToMany('App\Models\Etiquetas');
        }

    public function items() {
        return $this->belongsToMany('App\Models\Items')->withPivot('value');
    }

    public function imagenes() {
        return $this->hasMany('App\Models\Imagenes', 'producto_id');
    }
        use HasFactory;

    public static function recuperarProductosFront(){
        $listaCategorias = Categorias::all();
        $listaProductos = array();
        foreach ($listaCategorias as $categoria) {
            $listaProductos[] = $categoria->productos->random();
        }
        return $listaProductos;
    }

    public static function recuperarListaCategorias(){
        $listaCategorias = Categorias::all();
        return $listaCategorias;
    }

    public static function recuperarPorCategoria($id){
        $listaProductos = Productos::where('categoria_id', $id);
        return $listaProductos->get();
    }

    public static function busquedaCategorias($idCategoria, $textoBusqueda){
        $resultadoBusqueda = DB::table("productos")->join("categorias", "productos.categoria_id", "=", "categorias.id")->join("items", "items.categoria_id", "=",  "categorias.id")->
                                 join("items_productos", "items.id", "=", "items_productos.items_id")->Where("categorias.id", "=", $idCategoria)->Where("items_productos.value", "LIKE", "%".$textoBusqueda."%");
        return $resultadoBusqueda->get();

//SELECT xxxxxxxx WHERE categorias.id = "$idCategoria"  
  //                AND (items_productos.value LIKE "%$textoBusqueda%" OR producto.titulo LIKE "%$textoBusqueda%" OR )

    }


}