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

    public static function recuperarPorCategoria($id){
        $listaProductos = Productos::where('categoria_id', $id);
        return $listaProductos->paginate(4);
    }
    /*Buscador Front */
    public static function busquedaCategorias($idCategoria, $textoBusqueda){
         $resultadoBusqueda = Productos::select('productos.id', 'productos.name','productos.image')
        ->join("items_productos", "productos.id","items_productos.productos_id")
        ->where("productos.categoria_id", $idCategoria)->distinct()
        ->where(function($query) use ($textoBusqueda){
            $query->where("productos.name", "like", "%$textoBusqueda%")
            ->orwhere("items_productos.value", "like", "%$textoBusqueda%"); 
        });
        return $resultadoBusqueda->paginate(4);
    }

    /*Buscador Back */
    public static function busquedaProductos($idCategoria, $textoBusqueda){
        $resultadoBusqueda = Productos::with('categoria')
        ->where("productos.categoria_id", $idCategoria)
        ->where("productos.name", "like", "%$textoBusqueda%")->distinct();
        return $resultadoBusqueda->paginate(3);
    }
}